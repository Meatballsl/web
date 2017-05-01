<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('resources/org/infoform/assets/img/apple-icon.png')}}"/>
    <link rel="icon" type="image/png" href="{{asset('resources/org/infoform/assets/img/favicon.png')}}"/>
    <title></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- CSS Files -->
    <link href="{{asset('resources/org/infoform/assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('resources/org/bootstrap-datetimepicker/sample in bootstrap v3/bootstrap/css/bootstrap.min.css')}}"
          rel="stylesheet"/>

    <link href="{{asset('resources/org/infoform/assets/css/paper-bootstrap-wizard.css')}}" rel="stylesheet"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('resources/org/infoform/assets/css/demo.css')}}" rel="stylesheet"/>

    <!-- Fonts and Icons -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('resources/org/infoform/assets/css/themify-icons.css')}}" rel="stylesheet">


    <link href="{{asset('resources/org/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"
          rel="stylesheet" media="screen">
</head>

<body>
<div class="image-container set-full-height"
     style="background-image: url('{{asset('resources/org/infoform/assets/img/paper-1.jpeg')}}')">
    <!--   Creative Tim Branding   -->
    <a href="#">
        <div class="logo-container">
            <div class="logo">
                <img src="{{asset('resources/org/infoform/assets/img/new_logo.png')}}">
            </div>
            <div class="brand">
                Creative Tim
            </div>
        </div>
    </a>

    <!--  Made With Paper Kit  -->
    <a href="{{url('home/person')}}" class="made-with-pk">
        <div class="brand">Ret</div>
        <div class="made-with">返回<strong>个人主页</strong></div>
    </a>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <!--      Wizard container        -->
                <div class="wizard-container">

                    <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form action="{{url('home/info')}}" method="post" enctype="multipart/form-data">
                            <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->
                            {{csrf_field()}}
                            <div class="wizard-header text-center">
                                <h3 class="wizard-title">完善个人信息</h3>
                                @if(session('msg'))
                                    <p class="category">{{session('msg')}}</p>
                                @else
                                    <p class="category">This information will let us know more about you.</p>
                                @endif
                            </div>

                            <div class="wizard-navigation">
                                <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1"
                                         aria-valuemax="3" style="width: 21%;"></div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="#about" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-user"></i>
                                            </div>
                                            About
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#account" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-settings"></i>
                                            </div>
                                            account
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#address" data-toggle="tab">
                                            <div class="icon-circle">
                                                <i class="ti-map"></i>
                                            </div>
                                            detail
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <h5 class="info-text"> Please tell us more about yourself.</h5>
                                        <div class="col-sm-6 ">
                                            <div class="form-group ">
                                                <label>昵称
                                                    <small>(required)</small>
                                                </label>
                                                <input name="user_nicename" type="text" class="form-control"
                                                       placeholder="Andrew...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>个性签名</label>
                                                <textarea name="signature" class="form-control" placeholder="" rows="9"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-sm-offset-2">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <input type="file" id="wizard-picture" name="avatar">
                                                    <img src="{{asset('resources/org/infoform/assets/img/default-avatar.jpg')}}"
                                                         class="picture-src" id="wizardPicturePreview" title=""/>

                                                </div>
                                                <h6>Choose Picture</h6>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="account">
                                    <h5 class="info-text"> do you want to share？ </h5>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="col-sm-4">
                                                <label>微博</label>
                                                <input name="weibo" type="text" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>微信</label>
                                                <input name="weixin" type="text" class="form-control">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>qq</label>
                                                <input name="qq" type="text" class="form-control">
                                            </div>
                                            <div class="col-sm-6 col-sm-offset-2">
                                                <div class="form-group">
                                                    <label>Email
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="user_email" type="email" class="form-control"
                                                           placeholder="andrew@creative-tim.com">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="info-text">know more about you！</h5>
                                        </div>

                                        <div class="col-sm-12 ">
                                            <div class="form-group">
                                                <label class="control-label">性别</label>
                                                <div>
                                                    <div class="radio-inline">
                                                        <label>
                                                            <input type="radio" name="sex" value="男">
                                                            男
                                                        </label>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <label>
                                                            <input type="radio" name="sex" value="女">
                                                            女
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 ">
                                            <div class="form-group">
                                                <label class="control-label">出生日期</label>
                                                <div class="input-group date form_date col-md-5" data-date=""
                                                     data-date-format="dd MM yyyy" data-link-field="dtp_input2"
                                                     data-link-format="yyyy-mm-dd">
                                                    <input class="form-control" size="16" type="text"  value="" readonly>
                                                    <span class="input-group-addon"><span
                                                                class="glyphicon glyphicon-remove"></span></span>
                                                    <span class="input-group-addon"><span
                                                                class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                                <input type="hidden" id="dtp_input2" name="birthday" value=""/>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">所在地区： </label>
                                                <fieldset id="global_location">
                                                    <select class="country" data-first-title="选择国家" name="country"></select>
                                                    <select class="state" data-required="true" name="state"></select>
                                                    <select class="city" data-required="true" name="city"></select>
                                                    <select class="region" data-required="true" name="region"></select>

                                                </fieldset>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd' name='next'
                                           value='Next'/>
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd'
                                            value='Finish'/>
                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-default btn-wd' name='previous'
                                           value='Previous'/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->


</div>

</body>

<!--   Core JS Files   -->
<script src="{{asset('resources/org/infoform/assets/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('resources/org/infoform/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('resources/org/infoform/assets/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{asset('resources/org/infoform/assets/js/paper-bootstrap-wizard.js')}}" type="text/javascript"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{asset('resources/org/infoform/assets/js/jquery.validate.min.js')}}" type="text/javascript"></script>


<script type="text/javascript"
        src="{{asset('resources/org/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}} "></script>
<script type="text/javascript"
        src="{{asset('resources/org/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.fr.js')}}"></script>

<script src="{{asset('resources/org/jQuery.cxSelect-1.4.1/js/jquery.cxselect.js')}}"></script>

<script>$('.form_date').datetimepicker({
        language: 'fr',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });


</script>

<script>
    (function () {
        var urlChina = '{{asset('resources/org/jQuery.cxSelect-1.4.1/js/cityData.min.json')}}';
        var urlGlobal = '{{asset('resources/org/jQuery.cxSelect-1.4.1/js/globalData.min.json')}}';
        var dataCustom = [
            {
                'v': '1', 'n': '第一级 >', 's': [
                {
                    'v': '2', 'n': '第二级 >', 's': [
                    {
                        'v': '3', 'n': '第三级 >', 's': [
                        {
                            'v': '4', 'n': '第四级 >', 's': [
                            {
                                'v': '5', 'n': '第五级 >', 's': [
                                {'v': '6', 'n': '第六级 >'}
                            ]
                            }
                        ]
                        }
                    ]
                    }
                ]
                }
            ]
            },
            {
                'v': 'test number', 'n': '测试数字', 's': [
                {
                    'v': 'text', 'n': '文本类型', 's': [
                    {'v': '4', 'n': '4'},
                    {'v': '5', 'n': '5'},
                    {'v': '6', 'n': '6'},
                    {'v': '7', 'n': '7'},
                    {'v': '8', 'n': '8'},
                    {'v': '9', 'n': '9'},
                    {'v': '10', 'n': '10'}
                ]
                },
                {
                    'v': 'number', 'n': '数值类型', 's': [
                    {'v': 11, 'n': 11},
                    {'v': 12, 'n': 12},
                    {'v': 13, 'n': 13},
                    {'v': 14, 'n': 14},
                    {'v': 15, 'n': 15},
                    {'v': 16, 'n': 16},
                    {'v': 17, 'n': 17}
                ]
                }
            ]
            },
            {
                'v': 'test boolean', 'n': '测试 Boolean 类型', 's': [
                {'v': true, 'n': true},
                {'v': false, 'n': false}
            ]
            },
            {
                v: 'test quotes', n: '测试属性不加引号', s: [
                {v: 'quotes', n: '引号'}
            ]
            },
            {
                v: 'test other', n: '测试奇怪的值', s: [
                {v: '[]', n: '数组（空）'},
                {v: [1, 2, 3], n: '数组（数值）'},
                {v: ['a', 'b', 'c'], n: '数组（文字）'},
                {v: new Date(), n: '日期'},
                {v: new RegExp('\\d+'), n: '正则对象'},
                {v: /\d+/, n: '正则直接量'},
                {v: {}, n: '对象'},
                {v: document.getElementById('custom_data'), n: 'DOM'},
                {v: null, n: 'Null'},
                {n: '未设置 value'}
            ]
            },
            {'v': '', 'n': '无子级'}
        ];

        $.cxSelect.defaults.url = urlChina;


        // 全球主要国家城市联动
        $('#global_location').cxSelect({
            url: urlGlobal,
            selects: ['country', 'state', 'city', 'region'],
            emptyStyle: 'none'
        });


    })();
</script>


</html>
