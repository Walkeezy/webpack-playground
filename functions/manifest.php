<?php // Get stuff from manifest.json
function get_manifest_file( $filename, $manifestPath = null ) {
  // Set the default path if one isn't provided.
  if ( is_null( $manifestPath ) ) {
    $manifestPath = __DIR__ . '/../build/manifest.json';
  }

  // Check the file exists before we try to load it.
  if ( ! file_exists( $manifestPath ) ) {
    return new \WP_Error( 'manifest', 'The Manifest file can not be found.', $manifestPath );
  }

  $manifest = json_decode( file_get_contents( $manifestPath ), true );

  // Attempt to match the requested file.
  if ( ! array_key_exists( $filename, $manifest ) ) {
    return new \WP_Error( 'manifest', 'The requested file could not be matched.', $filename );
  }

  return $manifest[$filename];
}
