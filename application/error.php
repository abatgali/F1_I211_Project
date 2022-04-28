<?php
/**
 * Author: Louie Zhu
 * Date: October 26, 2020
 * Name: error.php
 * Description: this script displays an error message. This script is globally available throughout the application. 
 *     The message to be displayed is passed to this script via variable $message. The dispatcher uses this to 
 *     display an error message when the requested controller is not found.
 */

$page_title = "Error";
//display header
IndexView::displayHeader($page_title);

?>
<hr>
<table style = "width: 100%; border: none">
    <tr>
        <td style = "text-align: left; vertical-align: top;">
            <h3> Sorry, but an error has occurred.</h3>
            <div style = "color: red">
                <?= urldecode($message) ?>
            </div>
            <br>
        </td>
    </tr>
</table>
<br><br><br><br><hr>

<?php
//display footer
IndexView::displayFooter();
