<?php  $this->template->partial('head'      , 'head')?>

<div class="wraper">
    <div class="topline"></div>

    <div class="header">
        <div class="container_header png_bg">
            <?php  $this->template->partial('header' , 'header')?>
            
            <div class="header_right">
                <?php  $this->template->partial('menu'   , 'menu' ,$menu_data)?>
                <?php  $this->template->partial('banner' , 'banner')?>
            </div>
        </div>

    </div>

    <div class="section">
        <div class="section_top">
            <div class="section_glow">
                <div class="section_container">
                    <div class="container">
                        <div class="breacumbs"> 
                            <?php  $this->template->partial('breadcumbs' , 'breadcumbs' , $breadcumbs_data)?>
                        </div>
                            
                        <div class="frame">
                            <div id="frame_top">
                                <div class="left-frame"></div>
                                <div class="frame-midlle"></div>
                                <div class="right-frame"></div>
                            </div>
                            <div class="frame_midell">
                                <div id="frame_all">
                                    <div class="article">
                                                <?php echo $this->template->yield(); ?>
                                                </div>
                                            </div>
										</div>
										<div id="frame_bottom">
                                            <div class="left-frame"></div>
                                            <div class="frame-midlle"></div>
                                            <div class="right-frame"></div>
                                        </div>
									</div>
							</div>
						</div>
					 </div>
				</div>
             </div>
			
			<div class="footer png_bg">
				<div class="container">
					<div class="footer_top">
						<div class="footer_content">

                            <?php $this->template->partial('footer' ,  'footer')?> 
