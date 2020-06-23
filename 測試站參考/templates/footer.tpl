<footer>
    {if $Config->Company.company_social1 || $Config->Company.company_social2 ||
        $Config->Company.company_social3 || $Config->Company.company_social4 ||
        $Config->Company.company_social5}
        <section class="module-xs  bg_o">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center pr10">

                            {if $Config->Company.company_social1}
                                <a href="{$Config->Company.company_social1}" class="i_word_color"
                                   title="{$smarty.const.defaultFooter_social1}">
                                    <i class="fa fa-search i_bg" aria-hidden="true"></i>
                                    <div class="p-t-10">
                                        <h5>{$smarty.const.defaultFooter_social1}</h5>
                                    </div>
                                </a>
                            {/if}

                            {if $Config->Company.company_social2}
                                <a href="{$Config->Company.company_social2}" class="i_word_color"
                                   title="{$smarty.const.defaultFooter_social2}">
                                    <i class="fa fa-cloud i_bg" aria-hidden="true"></i>
                                    <div class="p-t-10">
                                        <h5>{$smarty.const.defaultFooter_social2}</h5>
                                    </div>
                                </a>
                            {/if}

                            {if $Config->Company.company_social3}
                                <a href="{$Config->Company.company_social3}" class="i_word_color"
                                   title="{$smarty.const.defaultFooter_social3}">
                                    <i class="fa fa-usd i_bg" aria-hidden="true"></i>
                                    <div class="p-t-10">
                                        <h5>{$smarty.const.defaultFooter_social3}</h5>
                                    </div>
                                </a>
                            {/if}

                            {if $Config->Company.company_social4}
                                <a href="{$Config->Company.company_social4}" class="i_word_color"
                                   title="{$smarty.const.defaultFooter_social4}">
                                    <i class="fa fa-bolt i_bg" aria-hidden="true"></i>
                                    <div class="p-t-10">
                                        <h5>{$smarty.const.defaultFooter_social4}</h5>
                                    </div>
                                </a>
                            {/if}

                            {if $Config->Company.company_social5}
                                <a href="{$Config->Company.company_social5}" class="i_word_color"
                                   title="{$smarty.const.defaultFooter_social5}">
                                    <i class="fa fa-clock-o i_bg" aria-hidden="true"></i>
                                    <div class="p-t-10">
                                        <h5>{$smarty.const.defaultFooter_social5}</h5>
                                    </div>
                                </a>
                            {/if}

                        </div>
                    </div>
                </div>
            </div>
        </section>
    {/if}


    <section class="footer">
        <div class="container">
            <div class="row">

                <div class="webeditor">
                    {$Config->Seo.footer|unescape}
                </div>

                <div class="col-sm-4">
                    <div class="col-sm-12">
                        {$Config->Seo.footer1|unescape}
                    </div>
                </div>
            </div>

            <div class="copyright">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="m-0">
                            {$Config->Company.company_nameTW} Designed by
                            <a href="http://www.atteipo.com.tw/" target="_blank">
                                ATTEIPO
                            </a>.
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-right">
                            <a href="#top" class="scroll-top">
                                <i class="fa fa-level-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</footer>