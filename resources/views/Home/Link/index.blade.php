@extends("Home.HomePublic.public")
@section("title","友情链接")

@section("home")
<link href="/static/link/css/nspage.css" rel="stylesheet" type="text/css" />

    <script language="javascript" type="text/javascript" src="/static/link/js/jquery-1.3.2.min.js"></script>

    <script language="javascript" type="text/javascript" src="/static/link/js/jquery.validate.min.js"></script>

    <script language="javascript" type="text/javascript" src="/static/link/js/jquery.metadata.js"></script>

    <script language="javascript" type="text/javascript">
    $(document).ready(function(){
        $("form").validate({
            errorLabelContainer: $("#errorInfo")
        });
    });
    
    
      </script>
      @if(session('success'))
       
          <script>alert('{{session('success')}}')</script>
      
      @endif
     
      @if(session('error'))
       
         <script>alert('{{session('error')}}')</script>
      
      @endif
 <div class="main mceneter">
        <div class="toplogo">
            <div class="title">
                友情链接
            </div>
        </div>
        <div class="cmain">
            <div class="ctitle">
                <h1>
                    所有链接</h1>
                <span></span>
            </div>
            <div class="cbox mceneter">
                <div class="linklist">
                    <div class="txtlink">
                        <!--文字链-->
                                
                                @foreach($data as $v)
                                <a href='{{$v->lurl}}' target="_blank" title=''>{{$v->lname}}</a>
                                @endforeach
                              
                    </div>
                    <div class="imglink">
                        <!--图片链-->
                    </div>
                </div>
            </div>
            <div class="ctitle">
                <h1>
                    申请加入</h1>
                <span></span>
            </div>
            <div class="cbox mceneter">
                <div class="linkadd">
                    <form name="addlink" method="post" action="/link">
                        <input name="uid" value="1" type="hidden" />
                        <input name="display" value="0" type="hidden" />
                        <dl>
                            <dt><font color="#ff0000">*</font>网站名:</dt>
                            <dd>
                                <input name="lname" id="webname" size="30" type="text" title="网站名必须填写" class="{required:true}" />
                            </dd>
                             <dd style="color:red">
                            @if (count($errors)>0)
                             @foreach ($errors->get('lname') as $error)
                              {{ $error }}
                             @endforeach
                          @endif
                          </dd>
                        </dl>
                        <dl>
                            <dt><font color="#ff0000">*</font>网址:</dt>
                            <dd>
                                <input name="lurl"  value="" size="30" id="url" type="text" title="网址必须填写" class="{required:true}" />
                            </dd>
                            <dd style="color:red">
                            @if (count($errors)>0)
                             @foreach ($errors->get('lurl') as $error)
                              {{ $error }}
                             @endforeach
                          @endif
                          </dd>

                        </dl>
                        <dl>
                            <dt>站长Email:</dt>
                            <dd>
                                <input name="email" size="30" type="text" value="" />
                            </dd>
                             <dd style="color:red">
                            @if (count($errors)>0)
                             @foreach ($errors->get('email') as $error)
                              {{ $error }}
                             @endforeach
                          @endif
                          </dd>

                        </dl>
                        <dl>
                            <dt>网站简介:</dt>
                            <dd>
                                <textarea name="descr" cols="30" rows="3"></textarea>
                            </dd>
                            <dd style="color:red">
                            @if (count($errors)>0)
                             @foreach ($errors->get('descr') as $error)
                              {{ $error }}
                             @endforeach
                          @endif
                          </dd>
                        </dl>                        
                        <dl>
                            <dd id="errorInfo"></dd>
                        </dl>
                       {{csrf_field()}}
                        <div class="submit">
                            <input  id="submit" value="提 交" class="button" type="submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
