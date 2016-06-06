<ul class="list-group margin-bottom-25 sidebar-menu">
    <?php 
        $cate_lv1 = DB::table('categories')->where('parent_id', 0)->get();
    ?>
    @foreach($cate_lv1 as $cate_lv1)
    <li class="list-group-item clearfix dropdown">
        <a href="{!!URL('category',[$cate_lv1->id,$cate_lv1->slug])!!}">
            <i class="fa fa-angle-right"></i>
            {!!$cate_lv1->name!!}
        </a>
        <ul class="dropdown-menu">
            <?php 
                $cate_lv2 = DB::table('categories')->where('parent_id', $cate_lv1->id)->get();
                show_cate_sidebar($cate_lv2, $cate_lv1->id);//app/MyFunction/function.php
            ?>
        </ul>
    </li>
    @endforeach
</ul>