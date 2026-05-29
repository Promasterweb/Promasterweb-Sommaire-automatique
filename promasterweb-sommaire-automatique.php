<?php
/**
 * Plugin Name: Promasterweb – Sommaire automatique
 * Description: Automatically generates an SEO-friendly table of contents from H2 headings in your WordPress posts.
 * Version: 2.3.0
 * Author: Promasterweb
 * Author URI: https://promasterweb.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: promasterweb-sommaire-automatique
 */
if (!defined('ABSPATH')) exit;

add_action('wp_enqueue_scripts', function () {

    if (!is_singular('post')) {
        return;
    }

    wp_enqueue_style(
        'pmw-article-toc',
        plugin_dir_url(__FILE__) . 'assets/toc.css',
        [],
        '1.0.0'
    );

}, 20);


add_filter('the_content', function ($content) {

    if (!is_singular('post')) {
        return $content;
    }

    if (!preg_match_all('/<h2[^>]*>(.*?)<\/h2>/i', $content, $matches)) {
        return $content;
    }

    $make_anchor = function (string $title): string {

        $title = wp_strip_all_tags($title);
        $title = remove_accents($title);
        $title = strtolower($title);

        $title = preg_replace('/[^a-z0-9\s]/', '', $title);

        $lang = defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : 'fr';

$stop_words_by_lang = [
    'fr' => [
        'le','la','les','de','des','du','un','une','et','ou',
        'pour','avec','sans','dans','sur','au','aux','par',
        'est','ce','ces','cette','son','ses','leur','leurs',
        'plus','moins','trop','meme'
    ],
    'en' => [
        'the','a','an','and','or','but','in','on','at','to',
        'for','of','with','by','from','is','are','was','were',
        'this','that','these','those','it','its'
    ],
    'es' => [
        'el','la','los','las','de','del','un','una','y','o',
        'para','con','sin','en','sobre','por','al','es',
        'este','esta','estos','estas','su','sus'
    ],
    'de' => [
        'der','die','das','des','dem','den','ein','eine','und',
        'oder','fur','mit','ohne','in','auf','an','ist','sind',
        'war','waren','dieser','diese','dieses'
    ],
];

$stop_words = $stop_words_by_lang[$lang] ?? $stop_words_by_lang['fr'];

        $words = array_values(array_filter(explode(' ', $title)));
        $words = array_diff($words, $stop_words);
        $words = array_slice($words, 0, 4);

        return implode('-', $words);
    };

    $items    = [];
    $used_ids = [];

    foreach ($matches[1] as $raw_title) {

        $title = trim(wp_strip_all_tags($raw_title));
        $base  = $make_anchor($title);

        if ($base === '') {
            continue;
        }

        $id = $base;
        $i  = 2;

        // Unicité
        while (in_array($id, $used_ids, true)) {
            $id = $base . '-' . $i;
            $i++;
        }

        $used_ids[] = $id;

        $content = preg_replace(
            '/<h2([^>]*)>' . preg_quote($raw_title, '/') . '<\/h2>/i',
            '<h2$1 id="' . esc_attr($id) . '">' . $raw_title . '</h2>',
            $content,
            1
        );

        $items[] = [
            'id'    => $id,
            'title' => $title,
        ];
    }

    if (count($items) < 2) {
        return $content;
    }

    ob_start(); ?>
    <nav class="pmw-article__toc" aria-label="<?php esc_attr_e( 'Table of Contents', 'promasterweb-sommaire-automatique' ); ?>">
        <h2><?php esc_html_e( 'Table of Contents', 'promasterweb-sommaire-automatique' ); ?></h2>
        <ol>
            <?php foreach ($items as $item): ?>
                <li>
                    <a href="#<?php echo esc_attr($item['id']); ?>">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
    <?php

    return ob_get_clean() . $content;

}, 12);