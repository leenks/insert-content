<?php 
/***************************************************************************
Plugin Name:  Insert conteudo entre parágrafos
Plugin URI:    insert-content
Description:  Ao ativar o plug-in, anúncios e outros  poderão ser distribuídos dentro do post
Version:      1.0
Author:       Aline Espalaor
Text Domain:  insert-content
**************************************************************************/

add_filter( 'the_content', 'wpse_ad_content');
function wpse_ad_content($content)
{
    if (!is_single()) return $content;
    $paragraphAfter = 2; // Digite o número de parágrafos para exibir o anúncio logo depois
    $content = explode("</p>", $content);
    $new_content = '';
    for ($i = 0; $i < count($content); $i++) {
        if ($i == $paragraphAfter) {
            $new_content.= '<div style="width: 100%; padding: 5px; margin: auto; background-color: #ff0;">';
            $new_content.= '<b> - - - - - - - CÓDIGO DO ANÚNCIO - - - - - - - </b>';
            $new_content.= '</div>';
        }

        $new_content.= $content[$i] . "</p>";
    }

    return $new_content;
}
?>