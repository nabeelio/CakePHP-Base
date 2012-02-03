<?php 
# *************************************************************************** 
# This PHP script creates a fresh ca-bundle.crt file for use with libcurl.  
# It downloads certdata.txt from Mozilla's source tree (see URL below), 
# then parses certdata.txt and extracts CA Root Certificates into PEM format. 
# This PHP script works on almost any platform since its only external 
# dependency is the OpenSSL commandline tool for optional text listing. 
# Successfully tested with PHP 4.3.11 and later versions. 
# Hacked by Guenter Knauf. 
# *************************************************************************** 
# * $Id: $ 
# *************************************************************************** 
# 

$url = 'http://lxr.mozilla.org/seamonkey/source/security/nss/lib/ckfw/builtins/certdata.txt?raw=1'; 
# If the OpenSSL commandline is not in search path you can configure it here! 
$openssl = 'openssl'; 

$version = '2.0'; 

$options = 'bfhijlnqtvz'; 
if (function_exists('getopt')) { 
  $opt = getopt($options); 
} else { 
  # Hack to simulate simple getopt-like functionality on Win32 (oh well). 
  $optionarray = preg_split('//', $options, -1, PREG_SPLIT_NO_EMPTY); 
  for ($a = 1; $a < $argc; $a++) { 
    if (!strncmp($argv[$a], '-', 1)) { 
      $opts = preg_split('//', substr($argv[$a], 1), -1, PREG_SPLIT_NO_EMPTY); 
      foreach ($opts as $o) { 
        if (in_array($o, $optionarray)) { 
          $opt[$o] = FALSE; 
        } 
      } 
    } 
  } 
} 

if (($argc > 1) && (strncmp($argv[$argc - 1], "-", 1) <> 0)) { 
  $crt = $argv[$argc - 1]; 
} else { 
  $crt = 'ca-bundle.crt'; 
} 

if (isset($opt['i'])) { 
  print str_repeat("=", 78)."\n"; 
  print "Script Version        : ".$version."\n"; 
  print "PHP Version           : ".PHP_VERSION."\n"; 
  print "PHP SAPI Name         : ".php_sapi_name()."\n"; 
  print "PHP Config File Path  : ".get_cfg_var('cfg_file_path')."\n"; 
  print "Operating System Name : ".PHP_OS."\n"; 
  print str_repeat("=", 78)."\n"; 
} 

if (isset($opt['h'])) { 
  printf("Usage:\t%s [-b] [-f] [-i] [-l] [-n] [-t] [-v] [<outputfile>]\n", basename($argv[0])); 
  print "\t-b\tbackup an existing version of ca-bundle.crt\n"; 
  print "\t-f\tsave certdata.txt after downloading\n"; 
  print "\t-i\tprint version info about used modules\n"; 
  print "\t-l\tprint license info about certdata.txt\n"; 
  print "\t-n\tno download of certdata.txt (to use existing)\n"; 
  print "\t-q\tbe really quiet (no progress output at all)\n"; 
  print "\t-t\tinclude plain text listing of certificates\n"; 
  print "\t-v\tbe verbose and print out processed CAs\n"; 
  print "\t-j\tcompress the outputfile with bzip2 (.bz2)\n"; 
  print "\t-z\tcompress the outputfile with zlib (.gz)\n"; 
  exit; 
} 

set_magic_quotes_runtime(0); 
$txt = substr(basename($url), 0, strpos(basename($url), '?')); 
if (is_file($txt) && isset($opt['n'])) { 
  if (!isset($opt['q'])) 
    print "Using '$txt' ...\n"; 
  $lines = file($txt); 
} else { 
  ini_get('allow_url_fopen') or die("This script requires 'allow_url_fopen=1' setting!\n"); 
  ini_set('user_agent', basename($argv[0]).'/'.$version); 
  if (!isset($opt['q'])) 
    print "Downloading '$txt' ...\n"; 
  $lines = file($url) or die("Couldn't download '$url'!\n"); 
  if (isset($opt['f'])) { 
    if (!$handle = fopen($txt, 'w')) { 
      die("Couldn't write to file '$txt'!\n"); 
    } 
    if (fwrite($handle, implode('', $lines)) === FALSE) { 
      die("Couldn't write to file '$txt'!\n"); 
    } 
    fclose($handle); 
  } 
} 

if (isset($opt['b']) && is_file($crt)) { 
  $bk = 1; 
  while (is_file("$crt.~${bk}~")) { 
    $bk++; 
  } 
  rename($crt, "$crt.~${bk}~"); 
} 

$format = isset($opt['t']) ? "plain text and " : ""; 
$currentdate = gmdate("D M d, Y H:i:s T"); 
$crtlines[] = "## 
## $crt -- Bundle of CA Root Certificates 
## 
## Converted at: $currentdate 
## 
## This is a bundle of X.509 certificates of public Certificate Authorities 
## (CA). These were automatically extracted from Mozilla's root certificates 
## file (certdata.txt).  This file can be found in the mozilla source tree: 
## '/mozilla/security/nss/lib/ckfw/builtins/certdata.txt' 
## 
## It contains the certificates in ${format}PEM format and therefore 
## can be directly used with curl / libcurl / php_curl, or with 
## an Apache+mod_ssl webserver for SSL client authentication. 
## Just configure this file as the SSLCACertificateFile. 
## 

"; 

$data = ''; 
$certnum = 0; 
$inside_cert = FALSE; 
$inside_license = FALSE; 
foreach ($lines as $line) { 
  if (strpos($line, "***** BEGIN LICENSE BLOCK *****")) { 
    $inside_license = TRUE; 
  } 
  if ($inside_license) { 
    $crtlines[] = $line; 
    if (isset($opt['l'])) 
      print $line; 
  } 
  if (strpos($line, "***** END LICENSE BLOCK *****")) { 
    $inside_license = FALSE; 
  } 
  if (preg_match('@^#|^\s*$"@', $line)) { 
  } 
  if (preg_match('@^CVS_ID\s+\"(.*)\"@', $line, $matches)) { 
    $crtlines[] = "# ".$matches[1]."\n"; 
  } 
  if (preg_match('@^CKA_LABEL\s+[A-Z0-9]+\s+\"(.*)\"@', $line, $matches)) { 
    $caname = $matches[1]; 
  } 
  if ($inside_cert) { 
    $octets = explode("\\", rtrim($line)); 
    array_shift($octets); 
    foreach ($octets as $octet) { 
      $data .= chr(octdec($octet)); 
    } 
  } 
  if (!strcasecmp($line, "CKA_VALUE MULTILINE_OCTAL\n")) { 
    $inside_cert = TRUE; 
  } 
  if ($inside_cert && !strcasecmp($line, "END\n")) { 
    $inside_cert = FALSE; 
    if (isset($opt['v'])) 
      print "Parsing: $caname\n"; 
    $crtlines[] = "\n"; 
    $crtlines[] = $caname."\n"; 
    $crtlines[] = str_repeat("=", strlen($caname))."\n"; 
    $pem = "-----BEGIN CERTIFICATE-----\n" 
         . chunk_split(base64_encode($data)) 
         . "-----END CERTIFICATE-----\n"; 
    $data = ''; 
    if (!isset($opt['t'])) { 
      $crtlines[] = $pem; 
    } else { 
      $descriptorspec = array( 
                              0 => array("pipe", "r"), 
                              1 => array("pipe", "w") 
                             ); 
      $cmd = "$openssl x509 -md5 -fingerprint -text -inform PEM"; 
      $process = proc_open($cmd, $descriptorspec, $pipes); 
      if (is_resource($process)) { 
        fwrite($pipes[0], $pem); 
        fclose($pipes[0]); 
        while (!feof($pipes[1])) { 
          $crtlines[] = fgets($pipes[1], 1024); 
        } 
        fclose($pipes[1]); 
        $return_value = proc_close($process); 
      } else { 
        die("pipe to openssl commandline failed!\n"); 
      } 
    } 
    $certnum ++; 
  } 
} 

if (!$handle = fopen($crt, 'w')) { 
  die("Couldn't open file '$crt'!\n"); 
} 
if (fwrite($handle, implode('', $crtlines)) === FALSE) { 
  die("Couldn't write to file '$crt'!\n"); 
} 

if (!isset($opt['q'])) 
  print "Done ($certnum CA certs processed).\n"; 

if (isset($opt['z'])) { 
  if (!extension_loaded("zlib")) { 
    if (ini_get('enable_dl')) { 
      dl("zlib"); 
    } 
    if (!extension_loaded("zlib")) { 
      die("ERROR: Extension 'zlib' is not loaded!\n"); 
    } 
  } else { 
    if (!$gz = gzopen("$crt.gz", "wb9")) { 
      die("Couldn't open file '$crt.gz'!\n"); 
    } 
    gzwrite($gz, implode('', $crtlines)); 
    gzclose($gz); 
  } 
} 

if (isset($opt['j'])) { 
  if (!extension_loaded("bz2")) { 
    if (ini_get('enable_dl')) { 
      dl("bz2"); 
    } 
    if (!extension_loaded("bz2")) { 
      die("ERROR: Extension 'bz2' is not loaded!\n"); 
    } 
  } else { 
    if (!$bz = bzopen("$crt.bz2", "w")) { 
      die("Couldn't open file '$crt.bz2'!\n"); 
    } 
    bzwrite($bz, implode('', $crtlines)); 
    bzclose($bz); 
  } 
} 

exit; 

?> 

