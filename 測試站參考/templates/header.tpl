<header class="header header-fixed header-transparent">
    <div class="container">

        <div class="inner-header">
            <a class="inner-brand" href="{$Config->wwwroot}" title="{$Config->Company.company_nameTW}">
                <img class="brand-light" src="{$Config->wwwfile}/img/logo-w.png" width="120"
                     alt="{$Config->Company.company_nameTW}"/>
                <img class="brand-dark" src="{$Config->wwwfile}/img/logo.png" width="120"
                     alt="{$Config->Company.company_nameTW}"/>
            </a>
        </div>

        <div class="main-nav-toggle">
            <div class="nav-icon-toggle" data-toggle="collapse" data-target="#custom-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
        </div>

        {* search *}
        <div class="inner-header pull-right">
            <div class="menu-extras clearfix">
                <div class="menu-item">
                    <div class="extras-search">
                        <a id="modal-search" href="javascript:void(0)">
                            <i class="icon-magnifier icons"></i>
                        </a>
                        <div style="position: relative">
                            <form action="{$Config->wwwroot}/search" class="header-search-form" method="get">
                                <div style="position: relative">
                                    <input type="text" placeholder="{$smarty.const.productSearch_in}" name="keyword"
                                           class="search_input"/>
                                    <button type="submit" class="search_btn">
                                        <i class="icon-magnifier icons"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav id="custom-collapse" class="main-nav collapse clearfix">
            <ul class="inner-nav pull-right">

                {* about *}
                <li{if $AboutNav} class="has-submenu"{/if}>
                    <a href="{if $AboutNav}javascript: void(0){else}{$Config->wwwroot}/about{/if}"
                       title="{$smarty.const.about_title}">
                        {$smarty.const.about_title}
                    </a>
                    {if $AboutNav}
                        <ul class="submenu">
                            {foreach from=$AboutNav key=k item=v}
                                <li>
                                    <a href="{$Config->wwwroot}/about/{$v.item_url}" title="{$v.item_name}">
                                        {$v.item_name}
                                    </a>
                                </li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>

                {* travel / albums *}
                <li{if $TravelNav} class="has-submenu"{/if}>
                    <a href="{if $TravelNav}javascript: void(0){else}{$Config->wwwroot}/travel{/if}"
                       title="{$smarty.const.travel_title}">
                        {$smarty.const.travel_title}
                    </a>
                    {if $TravelNav}
                        <ul class="submenu">
                            {foreach from=$TravelNav key=k item=v}
                                <li>
                                    <a href="{$Config->wwwroot}/travel/{$v.group_url}" title="{$v.group_name}">
                                        {$v.group_name}
                                    </a>
                                </li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>

                {* custom / albums *}
                <li{if $CustomNav} class="has-submenu"{/if}>
                    <a href="{if $CustomNav}javascript: void(0){else}{$Config->wwwroot}/custom{/if}"
                       title="{$smarty.const.custom_title}">
                        {$smarty.const.custom_title}
                    </a>
                    {if $CustomNav}
                        <ul class="submenu">
                            {foreach from=$CustomNav key=k item=v}
                                <li>
                                    <a href="{$Config->wwwroot}/custom/{$v.group_url}" title="{$v.group_name}">
                                        {$v.group_name}
                                    </a>
                                </li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>

                {* daytrip / albums *}
                <li{if $DaytripNav} class="has-submenu"{/if}>
                    <a href="{if $DaytripNav}javascript: void(0){else}{$Config->wwwroot}/daytrip{/if}"
                       title="{$smarty.const.daytrip_title}">
                        {$smarty.const.daytrip_title}
                    </a>
                    {if $DaytripNav}
                        <ul class="submenu">
                            {foreach from=$DaytripNav key=k item=v}
                                <li>
                                    <a href="{$Config->wwwroot}/daytrip/{$v.group_url}" title="{$v.group_name}">
                                        {$v.group_name}
                                    </a>
                                </li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>

                {* chartered / about *}
                <li{if $CharteredNav} class="has-submenu"{/if}>
                    <a href="{if $CharteredNav}javascript: void(0){else}{$Config->wwwroot}/chartered{/if}"
                       title="{$smarty.const.chartered_title}">
                        {$smarty.const.chartered_title}
                    </a>
                    {if $CharteredNav}
                        <ul class="submenu">
                            {foreach from=$CharteredNav key=k item=v}
                                <li>
                                    <a href="{$Config->wwwroot}/chartered/{$v.group_url}" title="{$v.group_name}">
                                        {$v.group_name}
                                    </a>
                                </li>
                            {/foreach}
                        </ul>
                    {/if}
                </li>

                {* score / about *}
                <li>
                    <a href="{$Config->wwwroot}/score" title="{$smarty.const.score_title}">
                        {$smarty.const.score_title}
                    </a>
                </li>

                {* faq *}
                <li>
                    <a href="{$Config->wwwroot}/faq" title="{$smarty.const.faq_title}">
                        {$smarty.const.faq_title}
                    </a>
                </li>

                {* contact *}
                <li>
                    <a href="{$Config->wwwroot}/contact" title="{$smarty.const.contact_title}">
                        {$smarty.const.contact_title}
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</header>