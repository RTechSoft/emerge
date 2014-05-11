<!-- ABOUT UNIT -->
<section id="about" class="color-light text-center waveCenter">
        <div class="container">
                <div class="divide40"></div>
                <div class="row ">
                        <div class="col-md-12">
                                        <h2 class="text-center">
                                        <center><img src="images/title.png"></center>
                                        </h2>
                        </div>
                </div>
                <div class="divide20"></div>
                <div class="row">
                        <div class="col-md-12 about">
                                <br>
                                <br>
                                <img src="images/helpMac.png">
                                <br>
                                <br>
                                        <div class="col-md-6"><img src="images/saveme.png"></div>
                                        <div class="col-md-6"><img src="images/plus.png"></div>
                                <br>
                                <img src="images/iphone2.png">
                                <div class="col-md-12">
                                        <center><div class="col-md-6"><img src="images/signup.png" height="300px"></div></center>
                                        <!-- <div class="col-md-6"><img src="images/signup.png" height="300px"></div> -->
                                </div>
                        </div>
                </div>
        </div>
        <div class="divide40"></div>
</section>
<!-- /ABOUT UNIT -->

<!-- SOCIAL BAR -->
<!-- <section class="color-danger social text-center">
        <section class="container">
                <div class="row">
                        <div class="col-md-12">
                                <h3>Be up to date, follow us</h3>
                                        <i class="fa fa-twitter-square fa-2x darkred rm20 bm10"></i>
                                        <i class="fa fa-facebook-square fa-2x darkred rm20 bm10"></i>
                                        <i class="fa fa-linkedin-square fa-2x darkred rm20 bm10"></i>
                                        <i class="fa fa-youtube-square fa-2x darkred rm20 bm10"></i>
                                        <i class="fa fa-google-plus-square fa-2x darkred rm20 bm10"></i>
                        </div>
                </div>
        </section>
</section> --><!--/SOCIAL BAR -->

<div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="
modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Need help?</h4>
                        </div>
                        <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'help-form',
                                'enableClientValidation'=>true,
                                'clientOptions'=>array(
                                        'validateOnSubmit'=>true
                                ),
                                'htmlOptions'=>array(
                                        'role'=>'form'
                                )
                        )); ?>
                        <div class="modal-body">
                                Enter your phone number here: <br>
                                <input type="text" name="Help[number]" id="" class="control-form" placeholder="e.g. 09191234567">

                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="btnHelp">Submit</button>
                        </div>
                        <?php $this->endWidget(); ?>
          </div>
</div>
</div>

<script>
        $(document).ready(function() {
                $('#ebutton').on('mousedown', function(){
                        $(this).attr('src','images/buttonPress.png');
                }).on('mouseup', function() {
                        $(this).attr('src', 'images/buttonActive.png');
                });
        });
</script>