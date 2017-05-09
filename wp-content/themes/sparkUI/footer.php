<style>
    .list-group li a,p {color: #333;}
    .list-group li a:hover{text-decoration: none;  color: #fe642d;}
    /*.list-group li p{color: #333;}*/
</style>

<div class="footer">
    <div style="height:2px;background-color: #fe642d"></div>
    <div style="height:4px;background-color: #ffe9e1"></div>

    <div class="container">
        <div class="row">

            <div class="col-md-9 col-sm-9 col-xs-9" id="col9">
                <div class="col-md-3 col-sm-3 col-xs-12" id="spark-foot-logo">
                    <a href="<?php echo site_url(); ?>"><img src="<?php bloginfo("template_url") ?>/img/logo.png"></a>
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-md-1 col-sm-1 col-xs-12" class="foot-link" id="spark-nav">
                    <p>导航</p>
                    <ul class="list-group">
                        <li class="list-group-item" ><a href="<?php echo site_url() . get_page_address('wiki');?>" >wiki</a></li>
                        <li class="list-group-item" ><a href="<?php echo site_url() . get_page_address('qa');?>" >问答</a></li>
                        <li class="list-group-item" ><a href="<?php echo get_the_permalink( get_page_by_title( '项目' )); ?>">项目</a></li>
                    </ul>
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-md-3 col-sm-3 col-xs-12" class="foot-link" id="contact-us">
                    <p>联系我们</p>
                    <ul class="list-group">
                        <li class="list-group-item"><a target="_blank" href="mailto:sparkspace@163.com">sparkspace@163.com</a></li>
                        <li class="list-group-item"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=2038448066&amp;site=qq&amp;menu=yes">QQ：2038448066</a></li>
                    </ul>
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-md-2 col-sm-2 col-xs-12" class="foot-link" id="friend-link">
                    <p>友情链接</p>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="https://www.microduino.cn/">Microduino官网</a></li>
                        <li class="list-group-item"><a href="https://cn.wordpress.org/">Wordpress</a></li>
                        <li class="list-group-item"><a href="http://www.ourspark.space/library/Home/Index/share.html">器材借还</a></li>
                    </ul>
                </div>
                <div class="clearfix visible-xs"></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12" style="text-align: center;padding:0;">
                <img src="<?php bloginfo("template_url") ?>/img/address.png" class="spark-QRCode">
            </div>
            <div class="clearfix visible-xs"></div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

<script src="http://localhost/spark_wpv2/wp-content/themes/sparkUI/javascripts/main.js"></script>

</body>
</html>
