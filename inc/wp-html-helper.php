<?php
/**
 * @Package     : Exsit
 * @Version     : 1.0.0
 * @Author      : Uicobe
 * @Author URI  : https://themeforest.net/user/aonecolor
 */


// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Image tag helper
 *
 * Usage:
 * echo exsit_img_tag([
 *   'url'   => $image_url,
 *   'alt'   => 'My image',
 *   'class' => 'img-fluid',
 *   'id'    => 'hero-img',
 *   'width' => 300,
 *   'height'=> 200,
 *   'srcset'=> $srcset,
 * ]);
 */

if ( ! function_exists( 'exsit_img_tag' ) ) {
    function exsit_img_tag( array $args ) {

        $defaults = array(
            'url'      => '',
            'alt'      => '',
            'class'    => '',
            'id'       => '',
            'width'    => '',
            'height'   => '',
            'srcset'   => '',
            'sizes'    => '',
            'loading'  => 'lazy',
            'decoding' => 'async',
        );

        $args = wp_parse_args( $args, $defaults );

        if ( empty( $args['url'] ) ) {
            return '';
        }

        $alt = ! empty( $args['alt'] )
            ? $args['alt']
            : ( function_exists( 'exsit_image_alt' ) ? exsit_image_alt( $args['url'] ) : '' );

        $attr = '';

        if ( ! empty( $args['class'] ) ) {
            $attr .= ' class="' . esc_attr( $args['class'] ) . '"';
        }
        if ( ! empty( $args['id'] ) ) {
            $attr .= ' id="' . esc_attr( $args['id'] ) . '"';
        }
        if ( ! empty( $args['width'] ) ) {
            $attr .= ' width="' . (int) $args['width'] . '"';
        }
        if ( ! empty( $args['height'] ) ) {
            $attr .= ' height="' . (int) $args['height'] . '"';
        }
        if ( ! empty( $args['srcset'] ) ) {
            $attr .= ' srcset="' . esc_attr( $args['srcset'] ) . '"';
        }
        if ( ! empty( $args['sizes'] ) ) {
            $attr .= ' sizes="' . esc_attr( $args['sizes'] ) . '"';
        }
        if ( ! empty( $args['loading'] ) ) {
            $attr .= ' loading="' . esc_attr( $args['loading'] ) . '"';
        }
        if ( ! empty( $args['decoding'] ) ) {
            $attr .= ' decoding="' . esc_attr( $args['decoding'] ) . '"';
        }

        return '<img src="' . esc_url( $args['url'] ) . '" alt="' . esc_attr( $alt ) . '"' . $attr . ' />';
    }
}

if ( ! function_exists( 'exsit_anchor_tag' ) ) {
    function exsit_anchor_tag( array $args ) {

        $defaults = array(
            'url'    => '',
            'text'   => '',
            'class'  => '',
            'id'     => '',
            'title'  => '',
            'target' => '',
            'rel'    => '',
        );

        $args = wp_parse_args( $args, $defaults );

        if ( empty( $args['url'] ) ) {
            return '';
        }

        $attr = '';

        if ( ! empty( $args['class'] ) ) {
            $attr .= ' class="' . esc_attr( $args['class'] ) . '"';
        }
        if ( ! empty( $args['id'] ) ) {
            $attr .= ' id="' . esc_attr( $args['id'] ) . '"';
        }
        if ( ! empty( $args['title'] ) ) {
            $attr .= ' title="' . esc_attr( $args['title'] ) . '"';
        }
        if ( ! empty( $args['target'] ) ) {
            $attr .= ' target="' . esc_attr( $args['target'] ) . '"';

            if ( '_blank' === $args['target'] && empty( $args['rel'] ) ) {
                $attr .= ' rel="noopener noreferrer"';
            }
        }
        if ( ! empty( $args['rel'] ) ) {
            $attr .= ' rel="' . esc_attr( $args['rel'] ) . '"';
        }

        return '<a href="' . esc_url( $args['url'] ) . '"' . $attr . '>' . wp_kses_post( $args['text'] ) . '</a>';
    }
}