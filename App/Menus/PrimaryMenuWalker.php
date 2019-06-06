<?php
/**
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */

namespace AD\App\Menus;

use Walker_Nav_Menu;

/**
 * Class MenuWalker
 * A custom menu walker for the Foundation menu structure.
 *
 * @package AD\App
 */
class PrimaryMenuWalker extends Walker_Nav_Menu
{

    public function __construct()
    {
        add_filter('nav_menu_css_class', [$this, 'navMenuCssClasses'], 10, 3);
        add_filter('nav_menu_link_attributes', [$this, 'navMenuLinkAttributes'], 10, 4);
        add_filter('nav_menu_item_title', [$this, 'navMenuItemTitle'], 10, 4);
    }

    /**
     * Filters nav menu list item to append classes if relevant
     *
     * @param $classes
     *
     * @return array $classes
     */
    public function navMenuCssClasses($classes, $item, $args)
    {
        // Only affect the menu placed in the 'primary' theme location
        if ('primary' !== $args->theme_location) {
            return $classes;
        }

        $classes[] = 'nav-item';

        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown';
        }

        if (in_array('current-menu-item', $classes) || in_array('current_page_item', $classes)) {
            $classes[] = 'active';
        }

        return $classes;
    }

    /**
     * Filter nav menu links to add bootstrap attributes to parent menu items
     *
     * @param $atts
     * @param $item
     * @param $args
     * @param $depth
     *
     * @return mixed $atts
     */
    public function navMenuLinkAttributes($atts, $item, $args, $depth)
    {
        // Only affect the menu placed in the 'primary' theme location
        if ('primary' !== $args->theme_location) {
            return $atts;
        }

        $atts['class'] = 'nav-link';

        if ($args->walker->has_children && $depth === 0) {
            $atts['class']         .= ' dropdown-toggle';
            $atts['data-toggle']   = 'dropdown';
            $atts['role']          = 'button';
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }

        return $atts;
    }

    /**
     * Add caret span to nav title if parent item
     *
     * @param $title
     * @param $item
     * @param $args
     * @param $depth
     *
     * @return mixed $title
     */
    public function navMenuItemTitle($title, $item, $args, $depth)
    {
        // Only affect the menu placed in the 'primary' theme location
        if ('primary' !== $args->theme_location) {
            return $title;
        }
            
        if ($args->walker->has_children && $depth === 0) {
            $title .= ' <span class="caret"></span>';
        }

        return $title;
    }

    /**
     * Starts the list before the elements are added.
     *
     * @see Walker::start_lvl()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of menu item. Used for padding.
     * @param array $args An array of arguments. @see wp_nav_menu()
     */
    public function start_lvl(&$output, $depth = 0, $args = [])
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul role=\"menu\" class=\"dropdown-menu \">\n";
    }
}
