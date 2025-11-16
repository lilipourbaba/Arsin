 
<div class="rug_detail ">
       
        
    <div class="component">
        <h4>Why it fit?</h4>
        <form action="" class="purpose">
            <input id=" " name=" " rows="4" cols="50" placeholder="Your prompt here..."> 
         </form>
    </div>
    <div class="component">
        <h4>Story</h4>
        <p class="muted"> <?= the_content() ?></p>
        <a href="#">Read full story</a>
    </div>
    <div class="component">
        <h4>Specifications</h4>

        <ul class="tab">
            <li class="deail-tab">construction 
            <ul class="deail-cont">
                <li><span class="muted">Technique</span> <?= get_field("Technique"); ?>
                <li><span class="muted">Techniqueknot density</span><?= get_field("knot-density"); ?></li>
                <li><span class="muted">pile height</span><?= get_field("pile-height"); ?></li>

            </ul>
            </li>
            <li  class="deail-tab">Materials
                <ul class="deail-cont">
                    <li><span class="muted">foundation</span><?= get_field("foundation"); ?></li>
                    <li><span class="muted">pile</span><?= get_field("pile"); ?></li>
                    <li><span class="muted">dyes</span><?= get_field("dyes"); ?></li>

                </ul>
            </li>
            <li  class="deail-tab">Dimensions
                <ul class="deail-cont">
                    <li><span class="muted">Length</span><?= get_field("Dimensions-Length"); ?></li>
                    <li><span class="muted">Width</span><?= get_field("Dimensions-Width"); ?></li>
                    <li><span class="muted">Tolerance</span><?= get_field("Dimensions-Tolerance"); ?></li>

                </ul>
            </li>
            <li class="deail-tab">Weight & Care
                <ul class="deail-cont">
                    <li><span class="muted">Weight</span><?= get_field("Care-Weight"); ?></li>
                    <li><span class="muted">Cleaning</span><?= get_field("Care-Cleaning"); ?></li>
                    <li><span class="muted">Rotation</span><?= get_field("Care-Rotation"); ?></li>

                </ul>
            </li>

        </ul>
    </div>
     
</div>
