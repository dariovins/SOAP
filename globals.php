<?php
//
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2002 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.02 of the PHP license,      |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: Shane Caraveo <Shane@Caraveo.com>   Port to PEAR and more   |
// | Authors: Dietrich Ayala <dietrich@ganx4.com> Original Author         |
// +----------------------------------------------------------------------+
//
// $Id$
//
// make errors handle properly in windows (thx, thong@xmethods.com)
error_reporting(2039);

$phpversion = substr(phpversion(),0,3);
if ($phpversion == "4.0") {
    die("requires PHP 4.1 or higher\n");
}
if ($phpversion == "4.1") {
    define("FLOAT","double");
} else {
    #print "setting float to float";
    define("FLOAT","float");
}

# for float support
# is there a way to calculate INF for the platform?
define("INF", 1.8e307); 
define("NAN", 0.0);

$soapLibraryName = "PEAR-SOAPx4 0.6";

// set schema version
$XMLSchemaVersion  = "http://www.w3.org/2001/XMLSchema";
$SOAPSchema = "http://schemas.xmlsoap.org/wsdl/soap/";
$SOAPSchemaEncoding = "http://schemas.xmlsoap.org/soap/encoding/";
$SOAPInteropOrg = "http://soapinterop.org/xsd";

// load types into typemap array
/*
$typemap["http://www.w3.org/2001/XMLSchema"] = array(
	"string","boolean","float","double","decimal","duration","dateTime","time",
	"date","gYearMonth","gYear","gMonthDay","gDay","gMonth","hexBinary","base64Binary",
	// derived datatypes
	"normalizedString","token","language","NMTOKEN","NMTOKENS","Name","NCName","ID",
	"IDREF","IDREFS","ENTITY","ENTITIES","integer","nonPositiveInteger",
	"negativeInteger","long","int","short","byte","nonNegativeInteger",
	"unsignedLong","unsignedInt","unsignedShort","unsignedByte","positiveInteger");
$typemap["http://www.w3.org/1999/XMLSchema"] = array(
	"i4","int","boolean","string","double","float","dateTime",
	"timeInstant","base64Binary","base64","ur-type");
$typemap[$SOAPInteropOrg] = array("SOAPStruct");
$typemap[$SOAPSchemaEncoding] = array("base64","array","Array");
*/
$typemap["http://www.w3.org/2001/XMLSchema"] = array(
	"string" => "string",
        "boolean" => "boolean",
        "float" => FLOAT,
        "double" => "double",
        "decimal" => "integer",
        "duration" => "integer",
        "dateTime" => "string",
        "time" => "string",
	"date" => "string",
        "gYearMonth" => "integer",
        "gYear" => "integer",
        "gMonthDay" => "integer",
        "gDay" => "integer",
        "gMonth" => "integer",
        "hexBinary" => "string",
        "base64Binary" => "string",
	// derived datatypes
	"normalizedString" => "string",
        "token" => "string",
        "language" => "string",
        "NMTOKEN" => "string",
        "NMTOKENS" => "string",
        "Name" => "string",
        "NCName" => "string",
        "ID" => "string",
	"IDREF" => "string",
        "IDREFS" => "string",
        "ENTITY" => "string",
        "ENTITIES" => "string",
        "integer" => "integer",
        "nonPositiveInteger" => "integer",
	"negativeInteger" => "integer",
        "long" => "integer",
        "int" => "integer",
        "short" => "integer",
        "byte" => "string",
        "nonNegativeInteger" => "integer",
	"unsignedLong" => "integer",
        "unsignedInt" => "integer",
        "unsignedShort" => "integer",
        "unsignedByte" => "integer",
        "positiveInteger"  => "integer"
        );
$typemap["http://www.w3.org/1999/XMLSchema"] = array(
	"i4" => "integer",
        "int" => "integer",
        "boolean" => "boolean",
        "string" => "string",
        "double" => "double",
        "float" => FLOAT,
        "dateTime" => "string",
	"timeInstant" => "string",
        "base64Binary" => "string",
        "base64" => "string",
        "ur-type" => "string"
        );
$typemap[$SOAPInteropOrg] = array("SOAPStruct" => "array");
$typemap[$SOAPSchemaEncoding] = array("base64" => "string","array" => "array","Array" => "array");

// load namespace uris into an array of uri => prefix
$namespaces = array(
	"http://schemas.xmlsoap.org/soap/envelope/" => "SOAP-ENV",
	$XMLSchemaVersion => "xsd",
	$XMLSchemaVersion."-instance" => "xsi",
	$SOAPSchemaEncoding => "SOAP-ENC",
	$SOAPInteropOrg=>"si");

$xmlEntities = array("quot" => '"',"amp" => "&",
	"lt" => "<","gt" => ">","apos" => "'");


?>