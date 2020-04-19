<aside class="col-md-3 hidden-sm hidden-xs" id="sidebar">
    <!-- widget shop categories -->
    <div class="widget shop-categories">
        <div class="widget-content">
            <ul>
                <li><a href="#" onClick="get_blogs_by_cat('all')"><?php echo ('모든 블로그');?></a></li>
                <?php
                $blogs=$this->db->get('blog_category')->result_array();
                foreach($blogs as $row){
                    ?>
                    <li>
                        <a href="#" onClick="get_blogs_by_cat('<?php echo $row['blog_category_id']; ?>')" >
                            <?php echo $row['name']; ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- /widget shop categories -->
    <br>
    <!--    <div class="row">-->
    <!--        --><?php
    //            echo $this->html_model->widget('special_blogs');
    //        /?>
    <!--    </div>-->
    <!-- widget tabs -->
    <div class="widget widget-tabs">
        <div class="widget-content special-blogs">
            <ul id="tabs" class="nav nav-justified">
                <li class="active">
                    <a href="#tab-s1" data-toggle="tab">
                        <?php echo ('recent');?>
                    </a>
                </li>
                <li>
                    <a href="#tab-s2" data-toggle="tab">
                        <?php echo ('popular');?>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- tab 1 -->
                <div class="tab-pane fade in active" id="tab-s1">
                    <div class="product-list">
                        <?php
                        $this->db->limit(3);
                        $this->db->order_by("blog_id", "desc");
                        $latest=$this->db->get('blog')->result_array();
                        foreach($latest as $row){
                            ?>
                            <div class="media">
                                <a class="pull-left media-link" href="<?php echo $this->crud_model->blog_link($row['blog_id']); ?>">
                                    <img class="img-responsive" src="<?php echo $this->crud_model->file_view('blog',$row['blog_id'],'','','thumb','src','',''); ?>" alt=""/>
                                    <i class="fa fa-eye"></i>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">
                                        <a href="<?php echo $this->crud_model->blog_link($row['blog_id']); ?>">
                                            <?php echo $row['title']; ?>
                                        </a>
                                    </h6>
                                    <div class="date">
                                        <ins><?php echo $row['date']; ?></ins>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- tab 2 -->
                <div class="tab-pane fade" id="tab-s2">
                    <div class="product-list">
                        <?php
                        $this->db->limit(3);
                        $this->db->order_by("number_of_view", "desc");
                        $popular=$this->db->get('blog')->result_array();
                        foreach($popular as $row){
                            ?>
                            <div class="media">
                                <a class="pull-left media-link" href="<?php echo $this->crud_model->blog_link($row['blog_id']); ?>">
                                    <img class="img-responsive" src="<?php echo $this->crud_model->file_view('blog',$row['blog_id'],'','','thumb','src','',''); ?>" alt=""/>
                                    <i class="fa fa-eye"></i>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">
                                        <a href="<?php echo $this->crud_model->blog_link($row['blog_id']); ?>">
                                            <?php echo $row['title']; ?>
                                        </a>
                                    </h6>
                                    <div class="date">
                                        <ins><?php echo $row['date']; ?></ins>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /widget tabs -->
</aside>
