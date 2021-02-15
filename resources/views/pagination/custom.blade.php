<?php
//source: https://stackoverflow.com/questions/28240777/custom-pagination-view-in-laravel-5

// config
$link_limit = 10; // maximum number of links (a little bit inaccurate, but will be ok for now)

?>
<style type="text/css">
    .pagination{
        width: 500px !important;
    }
    .custom_style{
     display: inline-block;
    border-radius: 3px;
    border: solid 1px #c0c0c0;

    }
    .pagination li a {
      color: #999999;
    }
    .pagination li.active {

     background-color: #6a1b9a;
    /*color: #fff;*/
    }
    .btn-nav-pagination{
        /*background-color: #6a1b9a;*/
        /*color: #f2f2f2 !important;*/
    }
</style>
@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="custom_style {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="txt-paginate btn-nav-pagination" href="{{ $paginator->url(1) }}">First</a>
         </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="custom_style {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="txt-paginate" href=" {{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        <li class="custom_style{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="txt-paginate btn-nav-pagination " href="{{ $paginator->url($paginator->lastPage()) }}">Last</a>
        </li>
    </ul>
@endif

