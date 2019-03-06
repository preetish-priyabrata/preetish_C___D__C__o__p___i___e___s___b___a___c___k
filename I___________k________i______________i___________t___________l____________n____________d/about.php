
<?php
include './class/DbConnection.php';
include './class/Message.php';
include './class/User.php';
$msg = new Message();
$usr = new User();
ob_start();
?>
<style>.content{padding: 4% 90px;}</style>
<!-- start about -->
<div class="about">
    <h4 style="font-size: 1.4em;
        color: #34495E;	text-shadow: 0 1px 0 #ffffff;">About  KIIT University L <?php echo "&";?> D </h4>

    <div class="about-p">
        
        <div style="width:70%;float: left">
        <p class="para">At The <b>  KIIT University L <?php echo "&";?> D</b> , we’re not just academic experts. We work with organisations to understand their business challenges, and provide outstanding learning and development solutions.</p>
        <h4>Professional Learning <?php echo "&";?> Development</h4>
        <p class="para">With more than 20 years’ experience of higher education, we know how adults learn. Explore our range of learning and development services (including apprenticeships), and how we use digital technology to maximise both learning and workplace performance.

            Our L<?php echo "&";?>D specialises in providing part-time, flexible, higher education. We pride ourselves on the quality of our teaching and the  support we provide. This extends to the business services we provide to employers, which include:</p>
      <ol style="list-style-type: circle;">
        <li><b>Apprenticeships:</b><p class="para"> We’ll train your apprentices to give them on-the-job experience that’s specific to your workplace.</p></li>

        <li><p class="para">Whether you’re looking to develop new or current employees, we offer a range of degree and higher apprenticeships that are designed for business needs.</p></li>

         <li><p class="para">Our apprenticeships are delivered flexibly to fit around your organisation’s demands, scalable for consistent training across multiple sites and provide high quality work-based learning for real business impact.</p></li>

        <li><b>Staff training:</b><p class="para"> Discover our range of courses and qualifications - which include short courses, certificates and diplomas, as well as the undergraduate and postgraduate degrees for which we’re renowned.</p></li>

        <li><b>Customised solutions:</b><p class="para"> We can tailor a business solution that is unique to your organisation. Learn about our customised solutions.</p></li>

        <li> <b>Staff accreditation:</b><p class="para"> We provide accredited training, and we can accredit your in-house training, enabling your staff to gain a recognised qualification.</p></li>
    <ol>
        <p>
             These are just some of the ways in which we work with organisations and their staff to help them to excel.</p>
        </div>
        <div style="float:right;width: 28%">
            <img src="images/clients/about_us.png">
        </div>
        <p class="clearfix"></p>
        <!-- <p class="para">In the last decade or so, the increase in population of unemployed youth coupled with a lack of availability of skilled manpower for industrial growth, has highlighted the issue of Employability Skills and Job-linkage. The Directorate General for Employment and Training, Government of India recognized the need for Employability Skills Development and introduced the same for implementation in all Government and Private ITIs and Diploma institutes in 2011. </p>
        <p class="para"> <b>Teerth Consultancies’ (TC)</b> work with ITIs and Diploma Institutes is in line with the spirit of these initiatives and addresses the issues of Employability Skills and Placement of students of ITIs to improve their employment and growth prospects in relevant industry.</p>
        <p class="para"> Since 2010 over 60 Diploma students have been trained in Employability Skills and students enrolled in the Placement-linked programs have been trained and helped with placement in different industries like Vikash Group, Everest Industries, Yazaki, United Spirits Limited and P&G etc.</p> -->
    </div>
    <div class="clear"></div>
    
</div>
<!-- end about -->
<?php
$pageContent = ob_get_contents();
$menuClass1 = "";
$menuClass2 = "active";
$menuClass3 = "";
$menuClass4 = "";
$menuClass5 = "";
$menuClass6 = "";
$header = "About Us";
$headerTag = "";
ob_get_clean();
include 'template_all.php';
?>