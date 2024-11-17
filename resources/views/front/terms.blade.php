@extends('front.layouts.master')
@section('title')
    الخصوصية
@endsection
@section('content')
<div class="clr"></div><br>
<div id="HomePage">
    <a href="{{url('privacy')}}" class="rgt card pages-card">
        <div class="card-body">
            <center>
                <i class="far fa-lightbulb fa-2x"></i>
                <div class="clr"></div>
                <h5 class="card-title">شروط الاستخدام </h5>
            </center>
        </div>
    </a>
    <a href="{{url('terms')}}" class="rgt card pages-card" style="border:1px dashed var(--main-color);">
        <div class="card-body">
            <center>
                <i class="fas fa-user-shield fa-2x" style="color:var(--main-color);"></i>
                <div class="clr"></div>
                <h5 class="card-title" style="color:var(--main-color);"> الخصوصية </h5>
            </center>
        </div>
    </a>
    <div class="clr"></div><br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="font-weight:bold;">الخصوصية</h5>
            <div class="card-text">
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>عتمد ChakirDevApp سياسة الخصوصية هذه لشرح كيفية قيام ChakirDevApp بجمع وتخزين واستخدام المعلومات التي تم جمعها فيما يتعلق بخدمات ChakirDevApp.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>من خلال تثبيت الخدمات أو استخدامها أو تسجيلها أو غير ذلك من الوصول إلى الخدمات ، فإنك توافق على سياسة الخصوصية هذه وتعطي موافقة صريحة ووافية على معالجة بياناتك الشخصية وفقًا لسياسة الخصوصية هذه. إذا كنت لا توافق على سياسة الخصوصية هذه ، فيرجى عدم تثبيت الخدمات أو استخدامها أو التسجيل فيها أو الدخول إليها بطريقة أخرى. يحتفظ ChakirDevApp بالحق في تعديل سياسة الخصوصية هذه في أوقات معقولة ، لذا يرجى مراجعتها بشكل متكرر.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>إذا قام ChakirDevApp بإجراء تغييرات جوهرية أو تغييرات كبيرة على سياسة الخصوصية هذه ، فقد يقوم ChakirDevApp بنشر إشعار على موقع ChakirDevApp مع سياسة الخصوصية المحدثة. إن استمرار استخدامك للخدمات يعني موافقتك على التغييرات في سياسة الخصوصية هذه.</strong></span></span></p>
                <p style="text-align:right"><span style="font-size:18px"><span style="color:var(--main-color);"><strong>البيانات غير الشخصية</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>لأغراض سياسة الخصوصية هذه ، تعني "البيانات غير الشخصية" المعلومات التي لا تحدد هويتك بشكل مباشر. قد تتضمن أنواع البيانات غير الشخصية التي يقوم ChakirDevApp بجمعها واستخدامها ، على سبيل المثال لا الحصر: خصائص التطبيق ، بما في ذلك ، على سبيل المثال لا الحصر ، اسم التطبيق واسم الحزمة والرمز المثبت على جهازك. سيتم الكشف عن تسجيل الوصول (بما في ذلك ، التوصية) للعبة لجميع مستخدمي ChakirDevApp.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>يجوز لـ ChakirDevApp استخدام البيانات غير الشخصية التي تم جمعها وإفشاءها لشركاء ومقاولي ChakirDevApps لأغراض تحليل استخدام الخدمات ، وتقديم الإعلانات ، وإدارة وتقديم الخدمات ، ومواصلة تطوير الخدمات وغيرها من خدمات ومنتجات ChakirDevApp.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>أنت تقر وتوافق على أن شركات التحليلات التي يستخدمها ChakirDevApp قد تجمع المعلومات التي تم جمعها مع معلومات أخرى جمعتها بشكل مستقل من خدمات أو منتجات أخرى تتعلق بأنشطتك. تقوم هذه الشركات بجمع واستخدام المعلومات بموجب سياسات الخصوصية الخاصة بها.</strong></span></span></p>
                <p style="text-align:right"><br>
                    <span style="color:var(--main-color);"><span style="font-size:18px"><strong>بيانات شخصية</strong></span></span>
                </p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>لأغراض سياسة الخصوصية هذه ، تعني "البيانات الشخصية" معلومات التعريف الشخصية التي تحدد هويتك على وجه التحديد كفرد.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>المعلومات الشخصية التي يجمعها ChakirDevApp هي المعلومات التي تقدمها لنا طوعًا عند إنشاء حسابك أو تغيير حسابك</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>معلومات. تتضمن المعلومات معرف Facebook الخاص بك واسمك وجنسك وموقعك ، كما أن أصدقائك على facebook. يقوم تطبيق ChakirDevApp أيضًا بتخزين عمليات تسجيل الوصول إلى اللعبة وإبداءات الإعجاب وعدم الإعجاب والتوصيات والرسائل.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>يجوز لـ ChakirDevApp استخدام البيانات الشخصية التي تم جمعها لأغراض تحليل استخدام الخدمات ، وتوفير العملاء والدعم الفني ، وإدارة وتوفير الخدمات (بما في ذلك إدارة خدمة الإعلانات) ومواصلة تطوير الخدمات وغيرها من خدمات ومنتجات ChakirDevApp. قد يجمع ChakirDevApp بين البيانات غير الشخصية والبيانات الشخصية.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>يرجى ملاحظة أن ميزات معينة من الخدمات قد تكون قادرة على الاتصال بمواقع الشبكات الاجتماعية الخاصة بك للحصول على معلومات إضافية عنك. في مثل هذه الحالات ، قد يكون ChakirDevApp قادرًا على جمع معلومات معينة من ملفك الشخصي على الشبكات الاجتماعية عندما يسمح لك موقع الشبكات الاجتماعية بذلك ، وعندما توافق على السماح لموقعك على الشبكات الاجتماعية بإتاحة هذه المعلومات لـ ChakirDevApp. قد تتضمن هذه المعلومات ، على سبيل المثال لا الحصر ، اسمك وصورة ملفك الشخصي وجنسك ومعرف المستخدم وعنوان البريد الإلكتروني وبلدك ولغتك ومنطقتك الزمنية والمنظمات والروابط على صفحة ملفك الشخصي وأسماء وصور ملفك الشخصي موقع "التواصل الاجتماعي" الخاص بك "الأصدقاء" والمعلومات الأخرى التي قمت بتضمينها في ملف تعريف موقع الشبكات الاجتماعية الخاص بك. يجوز لـ ChakirDevApp ربط و / أو دمج واستخدام المعلومات التي تم جمعها بواسطة ChakirDevApp و / أو التي يتم الحصول عليها من خلال مواقع الشبكات الاجتماعية هذه وفقًا لسياسة الخصوصية هذه.</strong></span></span></p>
                <p style="text-align:right"><span style="font-size:18px"><span style="color:var(--main-color);"><strong>الإفصاح ونقل البيانات الشخصية</strong></span></span></p>
                <p style="text-align:right"><br>
                    <span style="color:#2c3e50"><span style="font-size:16px"><strong>يقوم ChakirDevApp بجمع ومعالجة البيانات الشخصية على أساس طوعي وليس في مجال بيع بياناتك الشخصية إلى أطراف ثالثة. ومع ذلك ، قد يتم الكشف عن البيانات الشخصية في بعض الأحيان وفقًا للتشريعات المعمول بها وسياسة الخصوصية هذه. بالإضافة إلى ذلك ، قد تكشف ChakirDevApp عن البيانات الشخصية لشركاتها الأم والشركات التابعة لها وفقًا لسياسة الخصوصية هذه.</strong></span></span>
                </p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>يجوز لـ ChakirDevApp الاستعانة بالوكلاء والمقاولين لجمع ومعالجة البيانات الشخصية نيابة عن ChakirDevApps وفي مثل هذه الحالات ، سيتم توجيه هؤلاء الوكلاء والمقاولين للامتثال لسياسة الخصوصية واستخدام البيانات الشخصية فقط للأغراض التي تم إشراك الطرف الثالث من أجلها ChakirDevApp. لا يجوز لهؤلاء الوكلاء والمقاولين استخدام بياناتك الشخصية لأغراض التسويق الخاصة بهم. قد يستخدم ChakirDevApp مزودي خدمة من أطراف ثالثة مثل معالجات بطاقات الائتمان وموفري خدمات البريد الإلكتروني ووكلاء الشحن ومحللي البيانات ومزودي معلومات الأعمال. يحق لـ ChakirDevApp مشاركة بياناتك الشخصية حسب الضرورة للأطراف الثالثة المذكورة أعلاه لتقديم خدماتهم لـ ChakirDevApp. ChakirDevApp غير مسؤول عن أفعال وإغفالات هذه الأطراف الثالثة ، باستثناء ما ينص عليه القانون الإلزامي.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>قد تكشف ChakirDevApp عن بياناتك الشخصية لأطراف ثالثة كما هو مطلوب من قبل تطبيق القانون أو المسؤولين الحكوميين الآخرين فيما يتعلق بالتحقيق في الاحتيال أو انتهاكات الملكية الفكرية أو أي نشاط آخر غير قانوني أو قد يعرضك أو ChakirDevApp للمسؤولية القانونية. قد يقوم ChakirDevApp أيضًا بالكشف عن بياناتك الشخصية لأطراف ثالثة عندما يكون لدى ChakirDevApp سبب للاعتقاد بأن الإفصاح ضروري لمعالجة الإصابات المحتملة أو الفعلية أو التدخل في حقوق ChakerDevApps أو ممتلكاتها أو عملياتها أو المستخدمين أو الآخرين الذين قد يتعرضون للأذى أو قد يعانون من فقدان أو الضرر ، أو يعتقد ChakirDevApp أن هذا الكشف ضروري لحماية حقوق ChakirDevApp ، ومكافحة الاحتيال و / أو الامتثال لإجراء قضائي ، أمر محكمة ، أو إجراء قانوني يتم تقديمه على ChakirDevApp. إلى الحد الذي يسمح به القانون المعمول به ، ستبذل ChakirDevApp جهودًا معقولة لإخطارك بهذا الكشف من خلال موقع ChakirDevApps على الويب أو بطريقة أخرى معقولة.</strong></span></span></p>
                <p style="text-align:right"><span style="font-size:18px"><span style="color:var(--main-color);"><strong>الضمانات</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>يتبع ChakirDevApp معايير الصناعة المقبولة عمومًا ويحافظ على ضمانات معقولة لمحاولة ضمان أمن وسلامة وخصوصية المعلومات الموجودة في حوزة ChakirDevApps. فقط الأشخاص الذين يحتاجون إلى معالجة بياناتك الشخصية فيما يتعلق بإنجاز مهامهم وفقًا لأغراض سياسة الخصوصية هذه ولأغراض إجراء الصيانة الفنية ، يمكنهم الوصول إلى بياناتك الشخصية في حوزة ChakirDevApps. يتم تخزين البيانات الشخصية التي يجمعها ChakirDevApp في بيئات تشغيل آمنة غير متاحة للجمهور. لمنع الوصول غير المصرح به عبر الإنترنت إلى البيانات الشخصية ، يحتفظ ChakirDevApp بالبيانات الشخصية خلف خادم محمي بجدار الحماية. ومع ذلك ، لا يمكن لأي نظام أن يكون آمنًا بنسبة 100٪ ، وهناك احتمال أنه على الرغم من جهود ChakirDevApps المعقولة ، قد يكون هناك وصول غير مصرح به إلى بياناتك الشخصية. باستخدام الخدمات ، فإنك تفترض هذه المخاطر</strong></span></span></p>
                <p style="text-align:right"><br>
                    <span style="font-size:18px"><span style="color:var(--main-color);"><strong>آخر</strong></span></span>
                </p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>يرجى الانتباه إلى الطبيعة المفتوحة لبعض الشبكات الاجتماعية والميزات المفتوحة الأخرى التي قد تتيحها لك خدمات ChakirDevApp. يمكنك اختيار الكشف عن البيانات الخاصة بك في سياق المساهمة بالمحتوى الذي ينشئه المستخدم في الخدمات. أي بيانات تكشف عنها في أي من هذه المنتديات أو المدونات أو الدردشات أو ما شابه هي معلومات عامة ، وليس هناك توقع للخصوصية أو السرية. ChakirDevApp غير مسؤول عن أي بيانات شخصية تختارها للجمهور في أي من هذه المنتديات.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>إذا كان عمرك أقل من 14 عامًا أو قاصرًا في بلد إقامتك ، فيرجى طلب إذن ولي أمرك القانوني لاستخدام الخدمات أو الوصول إليها. يأخذ ChakirDevApp خصوصية الأطفال على محمل الجد ، ويشجع الآباء و / أو الأوصياء على لعب دور نشط في تجربة أطفالهم عبر الإنترنت في جميع الأوقات. لا يقوم ChakirDevApp بجمع أي معلومات شخصية عن عمد من الأطفال دون السن المذكورة ، وإذا علم ChakirDevApp أن ChakirDevApp قد جمع عن غير قصد بيانات شخصية من الأطفال تحت السن المذكورة ، سيتخذ ChakirDevApp تدابير معقولة لمحو هذه البيانات الشخصية على الفور من سجلات ChakirDevApps.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>يجوز لـ ChakirDevApp تخزين و / أو نقل بياناتك الشخصية إلى الشركات التابعة لها وشركائها داخل وخارج الدول الأعضاء في الاتحاد الأوروبي / المنطقة الاقتصادية الأوروبية والولايات المتحدة وفقًا للتشريع الإلزامي وسياسة الخصوصية هذه. يجوز لـ ChakirDevApp الإفصاح عن بياناتك الشخصية لأطراف ثالثة فيما يتعلق بدمج الشركة ، ودمجها ، وإعادة هيكلتها ، وبيع جميع أسهم و / أو أصول ChakirDevApps أو أي تغيير مؤسسي آخر ، بما في ذلك ، على سبيل المثال لا الحصر ، خلال أي عملية من إجراءات العناية الواجبة. شريطة ، مع ذلك ، أن سياسة الخصوصية هذه ستستمر في التحكم في هذه البيانات الشخصية.</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>يراجع ChakirDevApp بانتظام امتثاله لسياسة الخصوصية هذه. إذا تلقى ChakirDevApp شكوى خطية رسمية منك ، فإن سياسة ChakirDevApps هي محاولة الاتصال بك مباشرة لمعالجة أي من مخاوفك. سوف تتعاون ChakirDevApp مع السلطات الحكومية المختصة ، بما في ذلك سلطات حماية البيانات ، لحل أي شكاوى تتعلق بجمع البيانات الشخصية أو استخدامها أو نقلها أو الكشف عنها والتي لا يمكن حلها وديًا بينك وبين ChakirDevApp.</strong></span></span></p>
                <p style="text-align:right"><span style="font-size:18px"><span style="color:var(--main-color);"><strong>خدمات الطرف الثالث</strong></span></span><br>
                    <span style="color:#2c3e50"><span style="font-size:16px"><strong>نحن نستخدم خدمات الطرف الثالث في تطبيقاتنا. تجمع هذه الخدمات بيانات الاستخدام وفقًا لسياسات الخصوصية الخاصة بها. الخدمات موصوفة أدناه.</strong></span></span>
                </p>
                <p style="text-align:right"><span style="color:var(--main-color);"><span style="font-size:18px"><strong>إعلان</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>تسمح أنظمة عرض الإعلانات التابعة لجهات خارجية باستخدام بيانات المستخدم لأغراض الاتصالات الإعلانية المعروضة في شكل لافتات وإعلانات أخرى على تطبيقات ChakirDevApp ، ربما بناءً على اهتمامات المستخدم.</strong></span></span></p>
                <p style="text-align:right"><span style="color:var(--main-color);"><span style="font-size:18px"><strong>جوجل ادسنس</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>نحن نستخدم Google Adsense by Google كخادم إعلانات رئيسي. يرجى الاطلاع على سياسة خصوصية Adsense - https://support.google.com/adsense/topic/1261918؟hl=ar&amp;ref_topic=1250104</strong></span></span></p>
                <p style="text-align:right"><span style="color:var(--main-color);"><span style="font-size:18px"><strong>تحليلات</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>تتيح لنا خدمات التحليلات التابعة لجهات خارجية مراقبة وتحليل استخدام التطبيق ، وفهم جمهورنا وسلوك المستخدم بشكل أفضل.</strong></span></span></p>
                <p style="text-align:right"><span style="color:var(--main-color);"><span style="font-size:18px"><strong>تحليلات كوكل</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>Google Analytics عبارة عن خدمة تحليل مقدمة من Google Inc. تستخدم Google البيانات التي تم جمعها لتتبع وفحص استخدام تطبيقات ChakirDevApp ، لإعداد تقارير حول أنشطة المستخدم ومشاركتها مع خدمات Google الأخرى. يجوز لشركة Google استخدام البيانات لتحديد سياق إعلانات شبكتها الإعلانية وتخصيصها. (https://policies.google.com/privacy؟hl=ar-SA)</strong></span></span></p>
                <p style="text-align:right"><span style="font-size:18px"><span style="color:var(--main-color);"><strong>الامتثال لقانون حماية خصوصية الأطفال على الإنترنت</strong></span></span></p>
                <p style="text-align:right"><span style="color:#2c3e50"><span style="font-size:16px"><strong>نحن ملتزمون بمتطلبات قانون حماية خصوصية الأطفال على الإنترنت (</strong></span></span><span style="color:#c0392b"><span style="font-size:16px"><strong>COPPA</strong></span></span><span style="color:#2c3e50"><span style="font-size:16px"><strong>) ، ولا نجمع أي معلومات شخصية من أي شخص يقل عمره عن 13 عامًا. يتم توجيه جميع منتجاتنا وخدماتنا إلى الأشخاص الذين لا يقل عمرهم عن 13 عامًا أو أكثر</strong></span></span></p>
                <p style="text-align:right"><br>
                    <span style="font-size:18px"><span style="color:var(--main-color);"><strong>اتصل بنا :</strong></span></span><br>
                    <span style="color:var(--main-color);"><span style="font-size:16px"><strong>الموقع الإلكتروني:</strong></span></span><span style="color:#2c3e50"><span style="font-size:16px"><strong> https://www.chakirdev.com/</strong></span></span><br>
                    <span style="color:var(--main-color);"><span style="font-size:16px"><strong>البريد:</strong></span></span><span style="color:#2c3e50"><span style="font-size:16px"><strong> chakirdev@outlook.com</strong></span></span>
                </p>
                <p style="text-align:right"><span style="color:var(--main-color);"><span style="font-size:16px"><strong>فيسبوك: </strong></span></span><span style="color:#2c3e50"><span style="font-size:16px"><strong>https://www.facebook.com/ChakirDev/</strong></span></span><br>
                    <span style="color:var(--main-color);"><span style="font-size:16px"><strong>تويتر:</strong></span></span><span style="color:#2c3e50"><span style="font-size:16px"><strong> https://www.twitter.com/ChakirDev/</strong></span></span><br>
                    <span style="color:var(--main-color);"><span style="font-size:16px"><strong>انستقرام:</strong></span></span><span style="color:#2c3e50"><span style="font-size:16px"><strong> https://www.instagram.com/ChakirDev</strong></span></span>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="clr"></div><br>

@endsection
