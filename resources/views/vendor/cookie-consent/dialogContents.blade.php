<div class="js-cookie-consent cookie-consent fixed-bottom inset-x-0 pb-2" style="background-color: black; padding-bottom: 18px;opacity:1;">
    <div class="max-w-7xl mx-auto px-6">
        <div class="p-2">
            <div class="flex items-center flex-wrap" style="display: inline;">
                <div class="w-0 flex-1 items-center hidden md:inline">
                    <p class="ml-3 text-white cookie-consent__message" style="font-size: 17px; text-align: left; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; ">
                        {!! trans('cookie-consent::texts.message') !!}
                        <strong style="font-family:sans-serif; float: right;">
                            <button class="btn btn-sm btn-primary text-white js-cookie-consent-agree cookie-consent__agree cursor-pointer flex  px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300">
                            {{ trans('cookie-consent::texts.agree') }}
                            </button>
                        </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
