<?php
require 'aws/aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
$your_access_key = 'TRBCFFZJ0Z4L26NR6MZ6';
$your_secret_key = 'AecxbXbtfTkBM0CroEXplLGqaxWiBhsCSMHXTZat';
$your_bucket_region = 'us-east-1'; // or 'eu-central-1'
$bucket = 'aggrc';
$auth_url = 'https://us-east-1.linodeobjects.com'; // or 'https://eu-central-1.linodeobjects.com'
$config = [
    'credentials' => new \Aws\Credentials\Credentials(
        $your_access_key,
        $your_secret_key
    ),
    'version' => 'latest',
    'region' => $your_bucket_region
];
if (!empty($auth_url) && parse_url($auth_url) !== false)
{
    $config['endpoint'] = $auth_url;
}
$s3Client = new \Aws\S3\S3Client($config);
// Upload an object by streaming the contents of a file
// $pathToFile should be absolute path to a file on disk
$result = $s3Client->putObject(array(
    'Bucket'     => $bucket,
    'Key'        => 'building_banner.jpg',
    'SourceFile' => 'building_banner.jpg',
    'Metadata'   => array(
        'Foo' => 'phillips',
        'Baz' => '66'
    )
));
// We can poll the object until it is accessible
$s3Client->waitUntil('ObjectExists', array(
    'Bucket' => 'aggrc',
    'Key'    => 'building_banner.jpg'
));
?>
