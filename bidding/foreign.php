<?php

if (!empty($data)) {
?>
<div class="container" style="padding-top:100px">
    <div class="row">
        <div
            class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $data['first_name'] . "'s Profile"; ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9 col-lg-9 " align="center"><img alt="User Pic"
                                                                            src="<?php echo $data['profile_picture']; ?>"
                                                                            class="img-circle img-responsive"
                                                                            style="max-width:30%;max-height:30%;">
                            </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">

                                    <tbody>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $data['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>First Name</td>
                                        <td><?php echo $data['first_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td><?php echo $data['last_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td><?php echo $data['birthdate']; ?></td>
                                    </tr>

                                    <tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <a href="mailto:info@support.com"><?php echo $data['email']; ?></a>
                                        </td>
                                    </tr>
                                   
                                   
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
        ?>
        <div class="container" style="padding-top:100px">
            <div class="row">
                <div
                    class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        This user doesn't exist!
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php
    }
    ?>

    <?php
        $ans = $db->prepare('SELECT rating_value FROM Rating WHERE sender_id = :sender AND receiver_id =:receiver');

        $ans->bindParam(':sender',$userSEI);
        $ans->bindParam(':receiver',$_GET["user"]);

        $ans->execute();

        if($ans->rowCount()==0){
            echo '<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">Rate me!</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row padder">
                                    <form name="ratingForm" id="rat" action="rating.php" method="post">
                                        <div id="stars-default"><input type=hidden name="rating"/></div>
                                        <input type=hidden name="user" value='.$_GET["user"].'/>
                                        <input type="submit" name="submit" id="submitBtn" value="Submit"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

                 <script>
                     $(document).ready(function(){$("#stars-default").rating(); });
                 </script>';
        }else{
           $resa = $ans->fetch();
           $delt = $resa["rating_value"];
           $ans->closeCursor();
           echo '<div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">My Rating of '.$data['username'].' </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row padder">';
            for($i=0;$i<$delt;$i++){
                echo '<span class="glyphicon glyphicon-star yellow"></span>' ;
            }
                              echo  '</div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>';

        }
        


    ?>
    