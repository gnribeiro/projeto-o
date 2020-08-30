    <div class="menu">
            <ul class="topnav">
            <?php foreach ($menu_data[1] as $menu):?>
			<li class="png_bg <?echo ($this->router->fetch_class() == $menu->permalink) ? 'active':'' ?> <?php echo $menu->permalink?>">
                    <?php if($menu->have_childs == 1):?>
                    <span>
                        <a href="#"><?php echo $menu->title?></a>
                    </span>
                    <?php else :?>
                        <a href="/<?php echo  $this->lang->lang().'/'.$menu->permalink.'/'?>"><?php echo $menu->title?></a>
                    <?php endif?>
				        
                    <?php if($menu->have_childs == 1):?>
                        <div class="subnav">
                            <div class="top png_bg"></div>
                                <ul class="png_bg">
                                <?php foreach ($menu_data[$menu->permalink] as $value): ?>
                                    <li><a href="/<?php echo  $this->lang->lang().'/'.$menu->permalink.'/'.$value->permalink.'/'.$value->id.'/'?>" class="png_bg "><?php echo $value->title ?></a></li>
                                <?php endforeach ?>
                                </ul>
                            <div class="bottom png_bg"></div>
                        </div>
                    <?php endif?>
		    	</li>
                
            <?php endforeach?>
        </ul>
    </div>

