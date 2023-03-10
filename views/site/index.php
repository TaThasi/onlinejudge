<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Home');
?>
<div class="row blog">
    <div class="col-md-8">
        <style>
            * {
                box-sizing:border-box
            }
            h2 {
                text-align: left;
            }
            .slideshow-container {
                max-width: 90%;
                position: relative;
                margin: auto;
            }
            .mySlides {
                display: none;
            }
            .text {
                color: #f2f2f2;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
            }
            .dot {
                cursor:pointer;
                height: 10px;
                width: 10px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
            }
            .active, .dot:hover {
                background-color: #717171;
            }
            .fade {
                -webkit-animation-name: fade;
                -webkit-animation-duration: 10s;
                animation-name: fade;
                animation-duration: 10s;
            }

            @-webkit-keyframes fade {
                from {opacity: .4} 
                to {opacity: 1}
            }

            @keyframes fade {
                from {opacity: .4} 
                to {opacity: 1}
            }
        </style>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="<?= Yii::getAlias('@web') ?>/images/pic1.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="<?= Yii::getAlias('@web') ?>/images/pic2.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
              <img src="<?= Yii::getAlias('@web') ?>/images/pic3.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="<?= Yii::getAlias('@web') ?>/images/pic4.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="<?= Yii::getAlias('@web') ?>/images/pic5.jpg" style="width:100%">
            </div>
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(0)"></span> 
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
            <span class="dot" onclick="currentSlide(4)"></span> 
        </div>  
        <script>
      
            var slideIndex;
      
            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }

                slides[slideIndex].style.display = "block";  
                dots[slideIndex].className += " active";
          
                slideIndex++;
          
                if (slideIndex > slides.length - 1) {
                    slideIndex = 0
                }    
          
                setTimeout(showSlides, 10000);
            }
      
            showSlides(slideIndex = 0);


            function currentSlide(n) {
                showSlides(slideIndex = n);
            }
        </script>
        <h3>Gi???i thi???u v??? h??? th???ng</h3>
            <p style="text-align: justify;">Greenhat Online Judge l?? h??? th???ng ch???m ??i???m l???p tr??nh tr???c tuy???n ???????c ph??t tri???n b???i Khoa C??ng ngh??? th??ng tin - Tr?????ng ?????i h???c K??? thu???t H???u c???n CAND.</p>
            <p style="text-align: justify;">M?? ngu???n ch????ng tr??nh (vi???t b???ng ng??n ng??? C, C++, Java, Python,...) s??? ???????c h??? th???ng t??? ?????ng bi??n d???ch th??nh ch????ng tr??nh ????? ki???m tra t??nh ch??nh x??c th??ng qua c??c b??? d??? li???u c?? s???n.</p>
    </div>
    <div class="col-md-4">
        <div class="blog-main">
            <h2 class="text-info" style="font-size: 24px;"><span><?=Yii::t('app','Notification')?></span></h2>
            <?php if (empty($news)): ?>
                <div class="text-muted" style="font-size: 18px; padding-left: 15px;">No notification.</div>
            <?php endif; ?>

            <?php foreach ($news as $v): ?>
                <div class="blog-post">
                    <h4 class="blog-post-title" style="font-size: 18px; padding-left: 15px;"><?= Html::a(Html::encode($v['title']), ['/site/news', 'id' => $v['id']]) ?></h4>
                    <p class="blog-post-meta"><span class="glyphicon glyphicon-time"></span> <?= Yii::$app->formatter->asDate($v['created_at']) ?></p>
                </div>
            <?php endforeach; ?>
            
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
                ]); ?>
            <hr>
            <h2 class="text-info" style="font-size: 24px;"><span><?=Yii::t('app','Recent Contest')?></span></h2>
            <?php if (empty($contest)): ?>
                <div class="text-muted" style="font-size: 18px; padding-left: 15px;">No contest.</div>
            <?php endif; ?>
            
            <div class="sidebar-module">
                <ol class="list-unstyled">
                    <?php foreach ($contests as $contest): ?>
                        <li>
                            <h4 class="blog-post-title" style="font-size: 18px; padding-left: 15px;"><?= Html::a(Html::encode($contest['title']), ['/contest/view', 'id' => $contest['id']]) ?></h4>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
            <hr>
            <h2 class="text-info" style="font-size: 24px;"><span><?=Yii::t('app','Recent Discussion')?></span></h2>
            <?php if (empty($discuss)): ?>
                <div class="text-muted" style="font-size: 18px; padding-left: 15px;">No discussion</div>
            <?php endif; ?>
            
            <div class="sidebar-module">
                <ol class="list-unstyled">
                    <?php foreach ($discusses as $discuss): ?>
                        <li class="index-discuss-item">
                            <div>
                                <?= Html::a(Html::encode($discuss['title']), ['/discuss/view', 'id' => $discuss['id']]) ?>
                            </div>
                            <small class="text-muted">
                                <span class="glyphicon glyphicon-user"></span>
                                <?= Html::a(Html::encode($discuss['nickname']), ['/user/view', 'id' => $discuss['username']]) ?>
                                    &nbsp;???&nbsp;
                                    <span class="glyphicon glyphicon-time"></span> <?= Yii::$app->formatter->asRelativeTime($discuss['created_at']) ?>
                                    &nbsp;???&nbsp;
                                    <?= Html::a(Html::encode($discuss['ptitle']), ['/problem/view', 'id' => $discuss['pid']]) ?>
                            </small>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</div>

