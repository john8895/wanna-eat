<main class="">
    <div id="home" class="flexslider fullheight color-white">
        <ul class="slides">
            {foreach from=$ModuleBanner key=k item=v}
                <li class="bg-black-alfa-30" style="background-image:url({$v.item_image})">
                    <div class="hero-caption">
                        <div class="hero-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 text-center">

                                        {if $v.item_summary}
                                            <h1 class="montserrat text-super-xl m-b-70">
                                                {$v.item_summary|nl2br}
                                            </h1>
                                        {/if}

                                        {if $v.item_summary1}
                                            <p>{$v.item_summary1|nl2br}</p>
                                        {/if}

                                        {if $v.item_hyperlink}
                                            <div class="btn-list m-t-45">
                                                <a href="{$v.item_hyperlink}" title="{$v.item_name}" target="_blank"
                                                   class="btn btn-circle btn-outline btn-green btn-lg">
                                                    {$smarty.const.common_more}
                                                </a>
                                            </div>
                                        {/if}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            {/foreach}
        </ul>
    </div>


    {* travel *}
    {if $Travel}
        <section class="bg_g p-t-70  p-b-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="module-header text-center">
                            <h2 class="montserrat text-uppercase divider-line">
                                {$smarty.const.travel_title}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="works-grid-wrapper">
                <div id="works-grid" class="works-grid works-grid-4">
                    {foreach from=$Travel key=k item=v}
                        <article class="work-item pd10">
                            <div class="work-wrapper">
                                <img src="{if $v.document.1.document_path}{$v.document.1.document_path}{else}{$Config->imageEmpty}{/if}"
                                     alt="{$v.item_name}"/>
                                <div class="work-overlay">
                                    <div class="work-caption text-center">
                                        {if $v.item_name}
                                            <h4 class="work-title  ind_pdt_tit1 center">
                                                {$v.item_name}
                                            </h4>
                                        {/if}

                                        {if $v.item_summary}
                                            <p class="work-category ind_pdt_con1 center p-t-10">
                                                {$v.item_summary|nl2br}
                                            </p>
                                        {/if}
                                    </div>
                                </div>
                                <a href="{$Config->wwwroot}/travel/{$v.item_url}" class="work-link"
                                   title="{$v.item_name}">
                                </a>
                            </div>
                            <a href="{$Config->wwwroot}/travel/{$v.item_url}" title="{$v.item_name}">
                                <div class="index_mob_theme">
                                    {if $v.item_name}
                                        <h4 class="work-6title  ind_pdt_mob_h4 center  m-t-10">
                                            {$v.item_name}
                                        </h4>
                                    {/if}

                                    {if $v.item_summary}
                                        <p class="work-category ind_pdt_mob_p center">
                                            {$v.item_summary|nl2br}
                                        </p>
                                    {/if}
                                </div>
                            </a>
                        </article>
                    {/foreach}
                </div>
            </div>
        </section>
    {/if}

    {* custom *}
    {if $Custom}
        <section class="module-sm  bg_g ">
            <div class="">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="module-header text-center">
                        <h2 class="montserrat text-uppercase divider-line">
                            {$smarty.const.custom_title}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="container-fulid  sp hidden-xs">
                <div class="row multi-columns-row post-columns">

                    {foreach from=$Custom key=k item=v}
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <article class="post format-image bg-white">
                                <div class="post-preview">
                                    <a href="{$Config->wwwroot}/custom/{$v.item_url}" title="{$v.item_name}">
                                        <img src="{if $v.document.1.document_path}{$v.document.1.document_path}{else}{$Config->imageEmpty}{/if}"
                                             alt="{$v.item_name}"/>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">
                                        <a href="{$Config->wwwroot}/custom/{$v.item_url}" title="{$v.item_name}"
                                           class="ind_pdt_tit2 center">
                                            {$v.item_name}
                                        </a>
                                    </h2>
                                    {if $v.item_summary}
                                        <p class="ind_pdt_con2">
                                            {$v.item_summary|nl2br}
                                        </p>
                                    {/if}
                                </div>
                            </article>
                        </div>
                    {/foreach}

                </div>
            </div>
            <div class="container sp hidden-lg hidden-md hidden-sm ">
                <div class="">
                    <div class="box-carousel" data-carousel-options='{literal}{"items":"3"}{/literal}'>

                        {foreach from=$Custom key=k item=v}
                            <div class="item post-columns">
                                <article class="post format-image bg-white">
                                    <div class="post-preview">
                                        <a href="{$Config->wwwroot}/custom/{$v.item_url}" title="{$v.item_name}">
                                            <img src="{if $v.document.1.document_path}{$v.document.1.document_path}{else}{$Config->imageEmpty}{/if}"
                                                 alt="{$v.item_name}"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title">
                                            <a href="{$Config->wwwroot}/custom/{$v.item_url}" title="{$v.item_name}"
                                               class="ind_pdt_tit2 center">
                                                {$v.item_name}
                                            </a>
                                        </h2>
                                        {if $v.item_summary}
                                            <p class="ind_pdt_con2">
                                                {$v.item_summary|nl2br}
                                            </p>
                                        {/if}
                                    </div>
                                </article>
                            </div>
                        {/foreach}

                    </div>
                </div>
            </div>
        </section>
    {/if}

    {* daytrip *}
    {if $Daytrip}
        <section class="module-sm  bg_g p-b-30">

            <div class="col-sm-6 col-sm-offset-3">
                <div class="module-header text-center">
                    <h2 class="montserrat text-uppercase divider-line">
                        {$smarty.const.daytrip_title}
                    </h2>
                </div>
            </div>

            <div class="container-fulid sp hidden-xs">

                <div class="row multi-columns-row post-columns">
                    {foreach from=$Daytrip key=k item=v}
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <article class="post format-image bg-white">
                                <div class="post-preview">
                                    <a href="{$Config->wwwroot}/daytrip/{$v.item_url}" title="{$v.item_name}">
                                        <img src="{if $v.document.1.document_path}{$v.document.1.document_path}{else}{$Config->imageEmpty}{/if}"
                                             alt="{$v.item_name}"/>
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h2 class="post-title">
                                        <a href="{$Config->wwwroot}/daytrip/{$v.item_url}" title="{$v.item_name}"
                                           class="ind_pdt_tit2 center">
                                            {$v.item_name}
                                        </a>
                                    </h2>
                                    {if $v.item_summary}
                                        <p class="ind_pdt_con2">
                                            {$v.item_summary|nl2br}
                                        </p>
                                    {/if}
                                </div>
                            </article>
                        </div>
                    {/foreach}
                </div>

            </div>
            <div class="container sp hidden-lg hidden-md hidden-sm ">
                <div class="">
                    <div class="box-carousel" data-carousel-options='{literal}{"items":"3"}{/literal}'>
                        {foreach from=$Daytrip key=k item=v}
                            <div class="item post-columns">
                                <article class="post format-image bg-white">
                                    <div class="post-preview">
                                        <a href="{$Config->wwwroot}/daytrip/{$v.item_url}" title="{$v.item_name}">
                                            <img src="{if $v.document.1.document_path}{$v.document.1.document_path}{else}{$Config->imageEmpty}{/if}"
                                                 alt="{$v.item_name}"/>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title">
                                            <a href="{$Config->wwwroot}/daytrip/{$v.item_url}" title="{$v.item_name}"
                                               class="ind_pdt_tit2 center">
                                                {$v.item_name}
                                            </a>
                                        </h2>
                                        {if $v.item_summary}
                                            <p class="ind_pdt_con2">
                                                {$v.item_summary|nl2br}
                                            </p>
                                        {/if}
                                    </div>
                                </article>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </section>
    {/if}


    {* Instagram *}
    <section class="module-sm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="module-header text-center">
                        <h2 class="montserrat text-uppercase">
                            <img src="{$Config->wwwfile}/img/tit01.jpg" width="30px">
                            {$smarty.const.defaultIndex_instagram}
                        </h2>
                        <hr>
                        <h2>{$smarty.const.defaultIndex_instagram_slogan}</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="height: 35vw;">
                <!-- SnapWidget -->
                <script src="https://snapwidget.com/js/snapwidget.js"></script>
                <iframe src="https://snapwidget.com/embed/793644" class="snapwidget-widget" allowtransparency="true"
                        frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:100%; "></iframe>
            </div>
        </div>
    </section>

    <section class="module  color-white" style="background: url({$Config->wwwfile}/img/fot.jpg) center; height: 450px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="text-right">
                        <div class="webeditor">
                            {$Config->Seo.content|unescape}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>