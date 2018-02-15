{% if template.layouts.helper.header %}{{ include (template.layouts.helper.header) }}{% endif %}
{% if template.layouts.helper.nav %}{{ include (template.layouts.helper.nav) }}{% endif %}
{% if content != null%}
<div id="product" class="" itemscope="" itemtype="http://schema.org/Product">
<section id="h1-description">
<div class="control-background-2 bg-black">
<div class="h1-description text-center">
<div class="container padding_top_2">
<div class="text-white">
<br><br>
{% if content.name %}
<h1 class="h1-description-heading padding_10">{{ content.name }}</h1>
<meta itemprop="name" content="{{ content.name }}" />
{% endif %}
<meta itemprop="description" content="Мы гарантируем что товар 100% есть в наличии !">
<div class="control-text-3 text-white"><div class="font_16 text_bold padding_2">Мы гарантируем что товар 100% есть в наличии !</div></div>
<div class="font_16"><div class="control-text-3 text-white">Мы доставим вам заказ в течении 3-7 дней (Но не позже !)</div></div>
<div class="font_16"><div class="control-text-3 text-white">Вы платите при получении !  (Наложенный платёж)</div></div>
<div class="font_16"><div class="control-text-3 text-white">
Стоимость доставки: {% if content.delivery.terms %}{{ content.delivery.terms }}{% else %}По тарифам перевозчика.{% endif %}
</div></div>
</div>
<div class="product-price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
{% if content.oldprice %}
<span class="control-text-2 text-red-md"><span class="product-price-old font_28 text_normal">
{{ content.oldprice }}
</span></span>
{% endif %}
{% if content.price %}
<span class="control-text-3 text-white"><span class="product-price-new font_42 text_bold" itemprop="price">
{{ content.price }}
<span itemprop="priceCurrency" content="{{ config.currency }}" class="">{{ config.shortname }}</span>
</span></span>
<input type="hidden" value="{{ content.product_id }}" name="product_id" id="product_id-{{ content.product_id }}">
<input type="hidden" value="{{ content.price }}" name="price" id="price-{{ content.product_id }}">
<input type="hidden" value="1" name="num" id="num-{{ content.product_id }}">
<meta itemprop="price" content="{{ content.price }}">
<meta itemprop="priceCurrency" content="{{ config.currency }}">
{% endif %}
{% if content.available >= 1 %}
<link itemprop="availability" href="http://schema.org/InStock">
{% endif %}
</div>
<div class="lead"><div class="control-text-3 text-red-md">Специальное предложение действует</div></div>
<span class="control-countdown countdown-red-md">
<div class="count-down">
<span class="countdown-lastest" data-y="{{ content.y }}" data-m="{{ content.m }}" data-d="{{ content.d }}" data-h="{{ content.h }}" data-i="{{ content.i }}" data-s="{{ content.s }}">
</span>
</div>
</span>
<div class="product-link padding_7">
<span class="control-button-3 btn-red">
<span class="control-link-a a-white a-hover-light-grey-md">
<a class="fancybox btn btn-lg btn-hover-effects btn-red" href="#block_order_{{ content.product_id }}"><i class="fa fa-cart-plus" aria-hidden="true"></i> {{ language.1 }}</a>
{% if template.layouts.helper.order %}{{ include (template.layouts.helper.order) }}{% endif %}
</span>
</span>
<span class="control-button-2 btn-black">
<span class="control-link-a a-white a-hover-light-grey-md">
<a href="#" onClick="addToCart({{ content.product_id }});" class="btn btn-lg btn-hover-effects"><i class="fa fa-balance-scale" aria-hidden="true"></i> {{ language.3 }}</a>
</span>
</span>
</div>
<div class="font_14 padding_7"><div class="control-text-3 text-white">Наш сайт работает полностью в автоматическом режиме.<br>Оформление заказа по телефону невозможно.</div></div>
</div>
</div>
</div>
</section>
<section class="product">
{% if content.description %}
<div class="container">
<div class="row justify-content-center padding_14">
<div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 control-background bg-white control-text-3 text-black">
{% autoescape false %}
{{ content.description }}
{% endautoescape %}
</div>
</div>
</div>
{% endif %}
<div class="container">
<div class="row justify-content-center padding_14">  
{% for image in content.images %}
<div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 control-background bg-white control-text-3 text-black">
<div class="album">
<div class="text-center cards">
<div class="bg-white control-text-3 text-black">
<a itemprop="image" data-fancybox="gallery" class="link-product-img" href="/{{ image }}" alt="{{ content.name }}">
<img itemprop="image" class="product-img-primary" src="/{{ image }}" alt="{{ content.name }}" alt="{{ content.name }}">
<img itemprop="image" content="/{{ image }}">
</a>
</div>
</div>
</div>
</div>
{% endfor %}
</div>
</div>
</section>
</div>
{% endif %}
{% if template.layouts.helper.newsletter %}{{ include (template.layouts.helper.newsletter) }}{% endif %}
{% if template.layouts.helper.footer %}{{ include (template.layouts.helper.footer) }}{% endif %}