<main>
    <div id="home" class="flexslider  fullheight color-white spheight">
        <ul class="slides">
            {foreach from=$ModuleBanner key=k item=v}
                <li class="bg-black-alfa-30" style="background-image:url({$v.item_image})"></li>
            {/foreach}
        </ul>
    </div>
    <section class="module-sm bg_g">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="montserrat text-uppercase m-b-10 title_style">{$title}</h3>
                    <ol class="breadcrumb text-14">
                        <li><a href="{$Config->wwwroot}"
                               title="{$smarty.const.default_title}">{$smarty.const.default_title}</a></li>
                        <li><a href="{$urlParent}" title="{$titleParent}">{$titleParent}</a></li>
                        {$titleLink}
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="p-b-70 bg_g">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">

                    <div class="webeditor">
                        {$main.content|unescape}
                    </div>

                    <form method="post">
                        <div class="row text-left">
                            <div class="col-md-12 col-sm-12">

                                <h2 class="montserrat text-center p-t-50 p-b-40">
                                    {$smarty.const.contactOrder_title}
                                </h2>

                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 form-group">
                                            <label>
                                                {$smarty.const.contactOrder_person} <span>*</span>
                                            </label>
                                            <input type="text" class="form-control input-lg" name="person"
                                                   value="{$smarty.post.person}"/>
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <label>
                                                        {$smarty.const.contactOrder_sex} <span>*</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-12 col-sm-12 form-group">
                                                    {foreach from=$SetSex key=k item=v}
                                                        <input class="form-check-input" type="radio"
                                                               name="sex" id="sex_{$k}" value="{$k}"
                                                                {if $k > 1} style="margin-left: 30px"{/if}
                                                                {if $smarty.post.sex == $k} checked{/if}/>
                                                        <label class="form-check-label" for="sex_{$k}">{$v}</label>
                                                    {/foreach}

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 form-group">
                                            <label>
                                                {$smarty.const.contactOrder_mobile} <span>*</span>
                                            </label>
                                            <input type="text" class="form-control input-lg" name="mobile"
                                                   value="{$smarty.post.mobile}"/>
                                        </div>

                                        <div class="col-md-6 col-sm-6 form-group">
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8">
                                                    <label>
                                                        {$smarty.const.contactOrder_tel} <span>*</span>
                                                    </label>
                                                    <input type="text" class="form-control input-lg" name="tel"
                                                           value="{$smarty.post.tel}"/>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                    <label>
                                                        {$smarty.const.contactOrder_telExt}
                                                    </label>
                                                    <input type="text" class="form-control input-lg" name="tel_ext"
                                                           value="{$smarty.post.tel_ext}"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 form-group">
                                            <label>
                                                {$smarty.const.contactOrder_subject}
                                            </label>
                                            <input type="text" class="form-control input-lg" name="subject"
                                                   value="{$smarty.post.subject}"/>
                                        </div>
                                        <div class="col-md-6 col-sm-6 form-group">
                                            <label>
                                                {$smarty.const.contactOrder_email} <span>*</span>
                                            </label>
                                            <input type="text" class="form-control input-lg" name="email"
                                                   value="{$smarty.post.email}"/>
                                        </div>
                                        <div class="col-md-6 col-sm-6 form-group">
                                            <label>
                                                {$smarty.const.contactOrder_wechat} <span>*</span>
                                            </label>
                                            <input type="text" class="form-control input-lg" name="wechat"
                                                   value="{$smarty.post.wechat}"/>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center mb-20">
                                <div class="g-recaptcha" data-sitekey="6LfWn58UAAAAACbJc10j3TPLZ4DlZBt9DJ60olL4"></div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  text-center p-t-20">
                                <button style="margin-right: 5px" type="reset" class="btn btn-lg btn-round btn-dark">
                                    {$smarty.const.contactIndex_reset}
                                </button>
                                <button type="submit" class=" btn btn-lg btn-round btn-dark">
                                    {$smarty.const.contactIndex_submit}
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>