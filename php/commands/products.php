<?php
use \Terminus\Products;

/**
 * Display information about upstream products available on Pantheon.
 */
class Products_Command extends Terminus_Command {

  /**
   * Search for and list Pantheon product information.
   *
   * ## OPTIONS
   *
   * [--category=<category>]
   * : general, publishing, commerce, etc
   *
   * [--type=<type>]
   * : Pantheon internal product type definition
   *
   * [--framework=<drupal|wordpress>]
   * : Filter based on framework
   *
   * ## EXAMPLES
   *
   * # Search for vanilla products
   * terminus producst list --category=vanilla
   *
   * # Search for core products
   * terminus producst list --type=core
   *
   * # Search for WordPress products
   * terminus producst list --framework=wordpress
   *
   * @subcommand list
   * @alias all
   */
  public function all( $args = array(), $assoc_args = array()) {

    $defaults = array(
      'type' => '',
      'category' => '',
      'framework' => '',
    );

    $assoc_args = array_merge( $defaults, $assoc_args );
    $products = Products::instance();
    $this->handleDisplay($products->query($assoc_args),$assoc_args);
    return $products;
  }


}
Terminus::add_command( 'products', 'Products_Command' );
