<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author JATIN
 */
class Message extends DbConnection {

    function successMessage($message) {
        ?>
        <div class="alert-success alert"><?php echo $message; ?></div>
        <?php
    }

    function errorMessage($message) {
        ?>
        <div class="alert-danger alert"><?php echo $message; ?></div>
        <?php
    }

    function findCurrentOpenings() {
        if (!isset($link)) {
            $link = $this->connectToDb();
        }
        $query = "SELECT * FROM `currentopenings` WHERE `status` = 'Active' AND `closing_date` >= curdate() ORDER BY `posting_date` DESC, `opening_id` DESC";
        $res = mysqli_query($link, $query);
        $rows = mysqli_num_rows($res);
        if ($rows) {
            return $res;
        } else {
            return false;
        }
    }

}
