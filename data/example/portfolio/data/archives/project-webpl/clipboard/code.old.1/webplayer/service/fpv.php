<!-- frequency pseudo-visualization, или частотная псевдовизуализация. для орков - имитация отображения частот трека, как в плеерах -->
<style>
    .qtback{
        position: fixed;
        height: 100%;
    }
    .columns0{
        width: 100%;
        font-size: 26px;
    }
    .muscolstyle{
        opacity: .2;
        overflow: hidden;
        color: #D4D4D4;
    }
    .muscolstyle span{
        color: red;
    }
    .muscolstyle a{
        color: #363C49;
    }
    <?php
        // style для ленивых
        $cor = 0;
        while($cor<=17){
            $kfr = 2; /*шаг*/ $kfstart = 0 + $kfr; $kfend = 100 - $kfr;
            echo '.column'.$cor.'{ width: 80%; animation: mb'.$cor.' '.mt_rand(5,15) /* скорость */.'s ease-in-out infinite; }'.'@keyframes mb'.$cor.'{ 0% { width: 0%; }';
            while($kfstart<=$kfend){ echo $kfstart.'% { width: '.mt_rand(1,100).'%; }'; $kfstart += $kfr; }
            echo '100% { width: 0%; } }';
            $cor++;
        }
    ?>
</style>

<?php
function fpvhtml(){
    echo '<div class="qtback"><div class="columns0">';
    $colcnt = 0; while($colcnt<=17){ echo '<div class="column'.$colcnt.' muscolstyle"><a>||</a>||||||||||<span>|||</span></div>'; $colcnt++; };
    echo '</div></div>';
}
?>

<?php // include '../fpv.php'; // fpvhtml() ?>