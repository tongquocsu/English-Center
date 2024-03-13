<?php
add_action('login_head', 'zilom_nsl_style_login_page', 100);
function zilom_nsl_style_login_page(){
   echo '<style type="text/css">';
   ?>
      .nsl-container-block{text-align: center!important;padding-top: 10px!important;}
      div.nsl-container[data-align="left"] {text-align: left;}
      div.nsl-container[data-align="center"] {text-align: center;}
      div.nsl-container[data-align="right"] {text-align: right;}
      div.nsl-container .nsl-container-buttons a {text-decoration: none !important;box-shadow: none !important;border: 0;}
      div.nsl-container .nsl-container-buttons {display: flex;padding: 5px 0;}
      div.nsl-container.nsl-container-block .nsl-container-buttons {display: inline-grid;grid-template-columns: minmax(145px, auto);}

      div.nsl-container-block-fullwidth .nsl-container-buttons {flex-flow: column;align-items: center;}
      div.nsl-container-block-fullwidth .nsl-container-buttons a,
      div.nsl-container-block .nsl-container-buttons a {flex: 1 1 auto;display: block;margin: 5px 0;width: 100%;}
      div.nsl-container-inline {margin: -5px;text-align: left;}
      div.nsl-container-inline .nsl-container-buttons {justify-content: center;flex-wrap: wrap;}
      div.nsl-container-inline .nsl-container-buttons a {margin: 5px;display: inline-block;}
      div.nsl-container-grid .nsl-container-buttons {flex-flow: row;align-items: center;flex-wrap: wrap;}
      div.nsl-container-grid .nsl-container-buttons a {flex: 1 1 auto;display: block;margin: 5px;max-width: 280px;width: 100%;
      }
      @media only screen and (min-width: 650px) {
         div.nsl-container-grid .nsl-container-buttons a {width: auto;}
      }
      div.nsl-container .nsl-button {cursor: pointer;vertical-align: top;border-radius: 4px;}
      div.nsl-container .nsl-button-default {color: #fff;display: flex;}
      div.nsl-container .nsl-button-icon {display: inline-block;}
      div.nsl-container .nsl-button-svg-container {flex: 0 0 auto;padding: 8px;display: flex;align-items: center;}
      div.nsl-container svg {height: 24px;width: 24px;vertical-align: top;}
      div.nsl-container .nsl-button-default div.nsl-button-label-container {margin: 0 24px 0 12px;padding: 10px 0;font-size: 16px;line-height: 20px;letter-spacing: .25px;overflow: hidden;text-align: center;text-overflow: clip;white-space: nowrap;flex: 1 1 auto;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;text-transform: none;display: inline-block;}
      div.nsl-container .nsl-button-google[data-skin="dark"] .nsl-button-svg-container {margin: 1px;padding: 7px;border-radius: 3px;background: #fff;}
      div.nsl-container .nsl-button-google[data-skin="light"] {border-radius: 1px;box-shadow: 0 1px 5px 0 rgba(0, 0, 0, .25);color: RGBA(0, 0, 0, 0.54);}
      div.nsl-container .nsl-button-apple .nsl-button-svg-container {padding: 0 6px;}
      div.nsl-container .nsl-button-apple .nsl-button-svg-container svg {height: 40px;width: auto;}
      div.nsl-container .nsl-button-apple[data-skin="light"] {color: #000;box-shadow: 0 0 0 1px #000;}
      div.nsl-container .nsl-button-facebook[data-skin="white"] {color: #000;box-shadow: inset 0 0 0 1px #000;}
      div.nsl-container .nsl-button-facebook[data-skin="light"] {color: #1877F2;box-shadow: inset 0 0 0 1px #1877F2;}
      div.nsl-container .nsl-button-apple div.nsl-button-label-container {font-size: 17px;}
      .nsl-clear {clear: both;}
      .nsl-container{clear: both;}
      div.nsl-container-inline[data-align="left"] .nsl-container-buttons {justify-content: flex-start;}
      div.nsl-container-inline[data-align="center"] .nsl-container-buttons {justify-content: center;}
      div.nsl-container-inline[data-align="right"] .nsl-container-buttons {justify-content: flex-end;}
      div.nsl-container-grid[data-align="left"] .nsl-container-buttons {justify-content: flex-start;}
      div.nsl-container-grid[data-align="center"] .nsl-container-buttons {justify-content: center;}
      div.nsl-container-grid[data-align="right"] .nsl-container-buttons {justify-content: flex-end;}
      div.nsl-container-grid[data-align="space-around"] .nsl-container-buttons {justify-content: space-around;}
      div.nsl-container-grid[data-align="space-between"] .nsl-container-buttons {justify-content: space-between;}
   <?php 
   echo '</style>';

}