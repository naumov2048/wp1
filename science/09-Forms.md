# Forms

1. Install and activate plugin contact-form-7. Can be downloaded from [here](https://wordpress.org/plugins/contact-form-7/)

2. Create form for feedback following the video instruction.

2. Create form for questions. This initial html
```
<form action="#">
    <div class="reply__wrapper">
        <div>
            <label for="name">Ваше имя <span>*</span></label>
            <input name="name" id="name" type="text" required>
        </div>
    </div>
    <div class="reply__wrapper">
        <div>
            <label for="mail">Email</label>
            <input name="mail" id="mail" type="email">
        </div>
        <div>
            <label for="phone">Ваш телефон <span>*</span></label>
            <input name="phone" id="phone" type="tel" required>
        </div>
    </div>
    <label for="text">Ваш вопрос <span>*</span></label>
    <textarea required name="text" id="text"></textarea>
    <button class="minibutton">Отправить</button>
    ...
</form>
```
translates to this form code:
```
<div class="reply__wrapper"><div><label for="m_name">Ваше имя <span>*</span></label>[text* m_name id:m_name]</div></div>
<div class="reply__wrapper"><div><label for="m_mail">Email</label>[email m_mail id:m_mail]</div><div><label for="m_phone">Ваш телефон <span>*</span></label>[tel* m_phone id:m_phone]</div></div>
<label for="m_description">Ваш вопрос <span>*</span></label>[textarea* m_description id:m_description]
<button class="minibutton">Отправить</button>
```
and in index.php, form outer html replaced with this:
```
<?= do_shortcode('[contact-form-7 id="9f3d7d7" title="Contact form 2"]') ?>
```

3. Summary: basically in contact-form-7 plugin, you paste inner html of normal html form and then replace inputs, textareas etc with 
```
[(input type)(* if required) (input name) id:(input id)]
```
