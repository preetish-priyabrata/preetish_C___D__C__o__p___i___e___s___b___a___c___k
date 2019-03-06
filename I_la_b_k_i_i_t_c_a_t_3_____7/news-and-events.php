<div class="col-padded col-shaded"><!-- inner custom column -->

    <ul class="list-unstyled clear-margins"><!-- widgets -->

        <li class="widget-container widget_nav_menu"><!-- widget -->

            <h1 class="title-titan">Notice</h1>
            <ul>
                <?php
                include_once"conf.php";
                $query = "SELECT * FROM `tbl_notice` WHERE `notice_status` = '1'  ORDER BY notice_id DESC ";
                $res = mysqli_query($con, $query);
                ?>
                <marquee style="height:210px;" onmouseout="this.start();" onmouseover="this.stop();" scrollamount="2"  direction="up" >
                    <?php
                    while ($row = mysqli_fetch_array($res)) {
                        ?>
                        <li style="text-align: justify;"><a href="<?php echo "../kiit_cat2/".$row['notice_doc']; ?>" download><?php echo $row['notice_subject']; ?></li>
                        <?php
                    }
                    ?>
                </marquee>
            </ul>
        </li><!-- widget end -->

        <li class="widget-container widget_text"><!-- widget -->

            <a href="../kiit_cat4/" class="custom-button cb-green1" title="Login Here">
                <i class="custom-button-icon fa fa-lock"></i>
                <span class="custom-button-wrap">
                    <span class="custom-button-title">Student Login</span>
                    <span class="custom-button-tagline">Login us whenewer you feel it’s time!</span>
                </span>
                <em></em>
            </a>

            <a href="enroll.php" class="custom-button cb-green" title="Register Here">
                <i class="custom-button-icon fa fa-check-square-o"></i>
                <span class="custom-button-wrap">
                    <span class="custom-button-title">Registration</span>
                    <span class="custom-button-tagline">Join us whenewer you feel it’s time!</span>
                </span>
                <em></em>
            </a>

            <a href="http://www.kiit.ac.in" target="_blank" class="custom-button cb-gray" title="Campus tour">
                <i class="custom-button-icon fa  fa-play-circle-o"></i>
                <span class="custom-button-wrap">
                    <span class="custom-button-title">Campus tour</span>
                    <span class="custom-button-tagline">Student's life at the glance. Take a tour...</span>
                </span>
                <em></em>
            </a>

            <a href="training.php" class="custom-button cb-yellow" title="Prospectus">
                <i class="custom-button-icon fa  fa-leaf"></i>
                <span class="custom-button-wrap">
                    <span class="custom-button-title">Prospectus</span>
                    <span class="custom-button-tagline">Request a free School Prospectus!</span>
                </span>
                <em></em>
            </a>

        </li><!-- widget end -->
    </ul><!-- widgets end -->

</div>