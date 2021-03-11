<div class="floatingButton" id="floatingMenu">
    <a href="#"><?php echo $this->mensaje?></a>
</div>
<nav class="menu">
        <input type="checkbox" href="#" name="expandmenu" id="expandmenu" class="expandmenu">
        <label class="expandmenu-button" for="expandmenu">
            <span class="lines first-line"></span>
            <span class="lines sec-line"></span>
            <span class="lines third-line"></span>
        </label>
        <a href="#" id="callReportes" class="menu-item col1"><i class="far fa-window-restore"></i></a>
        <a href="<?php echo constant('URL')?>preguntas" class="menu-item col2" title="Trivia"><i class="far fa-question-circle"></i></a>
        <a href="#" class="menu-item col3"><i class="fa fa-bell"></i></a>
        <a href="#" class="menu-item col4"><i class="fa fa-cart-arrow-down"></i></a>
        <a href="#" class="menu-item col5"><i class="fa fa-phone"></i></a>
        <a href="#" class="menu-item col6"><i class="fa fa-info"></i></a>
    </nav>