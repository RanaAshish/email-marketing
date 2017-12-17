<style>
    .front{
        display:none;
        position: absolute;
        top: 36%;
        left: 40%;
        width: 30%;
        height: 25%;
        padding: 16px;

        background-color: transparent;
        -moz-border-radius-topright: 2em;
        -moz-border-radius-topleft: 2em;
        -moz-border-radius-bottomright: 2em;
        -moz-border-radius-bottomleft: 2em;
        z-index:3;
    }
    .back{
        display: none;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity:0.7;
        z-index:2;
    }
    .ta-editor {
        min-height: 300px;
        height: auto;
        overflow: auto;
        font-family: inherit;
        font-size: 100%;
    }
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>

<div id="ang" class="side-bar right-bar nicescroll" ng-init="">
    <h4 class="text-center">
        Edit Widget Information
    </h4>

    <!--Text-->

    <div ng-if="lists.selected.info == 'Text'" style='height:475px;overflow:scroll'>
        <div class="col-md-12 col-lg-12">
            <div class="panel panel-default m-t-20">
                <div class="panel-body p-t-30">
                    <div class="container app">
                        <div text-angular="text-angular" ng-model="lists.selected.data" ta-disabled='disabled'></div>
                        <!--<textarea ng-model="htmlcontent" style="width: 100%"></textarea>-->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--image-->

    <div ng-if="lists.selected.info == 'Image'" style='height:475px;overflow:scroll'>
        <div class="col-sm-12 row">

            <div class="col-sm-4" style="height:101px;width:144px;background-color: whitesmoke;text-align: center;padding: 2px">
                <img src="{{lists.selected.thumbnil}}"  alt="Img Format" style="min-height: 100%;max-height: 100%"/>
            </div>
            <div class="col-sm-8">
                <br/>
                <a href="#" ng-click="BrowseImage()">Replace</a>
            </div>

        </div>
        <div class="row col-sm-12" style="padding: 3%">
            <div>
                <label>Align:</label>
                <select class="form-control" id="align" ng-change="applyStyleToDiv('text-align', lists.selected.divcss['text-align'])" ng-model="lists.selected.divcss['text-align']">
                    <option value="center">Center</option>
                    <option value="left">Left</option>
                    <option value="right">Right</option>
                </select>
            </div>
        </div>

        <div class="row col-sm-12" style="padding: 3%">
            <label>Border:</label>
            <div class="form-group">
                <div class="col-sm-3">
                    <select class="form-control" id="align" ng-change="applyStyle('border-style', lists.selected.cssstyle['border-style'])" ng-model="lists.selected.cssstyle['border-style']">
                        <option value="none">None</option>
                        <option value="solid">Solid</option>
                        <option value="dotted">Dotted</option>
                        <option value="double">Double</option>
                        <option value="grove">Grove</option>
                        <option value="ridge">Ridge</option>
                        <option value="outset">Outset</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type="number" class="col-lg-4 form-control" ng-change="applyStyle('border-width', lists.selected.cssstyle['border-width'])" ng-model="lists.selected.cssstyle['border-width']"/>
                </div>
                <div class="col-md-4 col-xs-11">
                    <input type="color" class="form-control" ng-change="applyStyle('border-color', lists.selected.cssstyle['border-color'])" ng-model="lists.selected.cssstyle['border-color']"/>
                </div>
            </div>
        </div>
    </div>

    <!--image + caption-->

    <div ng-if="lists.selected.info == 'Image caption'" style='height:475px;overflow:scroll'>
        <div class="col-lg-12">
            <ul class="nav nav-tabs navtab-bg">
                <li class="active">
                    <a href="#home" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-home"></i></span> 
                        <span class="hidden-xs">Style</span>
                    </a>
                </li>
                <li class="">
                    <a href="#profile" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-user"></i></span> 
                        <span class="hidden-xs">Content</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="row">
                        <div class="col-sm-4" style="height:101px;width:144px;background-color: whitesmoke;text-align: center;padding: 0">
                            <img src="{{lists.selected.thumbnil}}"  alt="Img Format" style="min-height: 100%;max-height: 100%"/>
                        </div>
                        <div class="col-sm-8">
                            <br/>
                            <a href="#" ng-click="BrowseImage()">Relpace</a>
                        </div>
                    </div>
                    <div class="row" style="padding: 3%">
                        <div>
                            <label>Align:</label>
                            <select class="form-control" id="align" ng-change="applyStyleToDiv('text-align', lists.selected.divcss['text-align'])" ng-model="lists.selected.divcss['text-align']">
                                <option value="center">Center</option>
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding: 3%">
                        <label>Border:</label>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <select class="form-control" id="align" ng-change="applyStyle('border-style', lists.selected.cssstyle['border-style'])" ng-model="lists.selected.cssstyle['border-style']">
                                    <option value="none">None</option>
                                    <option value="solid">Solid</option>
                                    <option value="dotted">Dotted</option>
                                    <option value="double">Double</option>
                                    <option value="grove">Grove</option>
                                    <option value="ridge">Ridge</option>
                                    <option value="outset">Outset</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="col-lg-4 form-control" ng-change="applyStyle('border-width', lists.selected.cssstyle['border-width'])" ng-model="lists.selected.cssstyle['border-width']"/>
                            </div>
                            <div class="col-md-4 col-xs-11">
                                <input type="color" class="form-control" ng-change="applyStyle('border-color', lists.selected.cssstyle['border-color'])" ng-model="lists.selected.cssstyle['border-color']"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="profile">
                    <div class="panel panel-default m-t-20">
                        <div class="panel-body p-t-30">
                            <div class="container app">
                                <div text-angular="text-angular" ng-model="lists.selected.data" ta-disabled='disabled'></div>
                                <!--<textarea ng-model="htmlcontent" style="width: 100%"></textarea>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div ng-if="lists.selected.info == 'Button'" style='height:475px;overflow:scroll'>
        <div class="col-lg-12">
            <ul class="nav nav-tabs navtab-bg">
                <li class="active">
                    <a href="#home" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-home"></i></span> 
                        <span class="hidden-xs">Content</span>
                    </a>
                </li>
                <li class="">
                    <a href="#profile" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-user"></i></span> 
                        <span class="hidden-xs">Style</span>
                    </a>
                </li>
                <li class="">
                    <a href="#message" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                        <span class="hidden-xs">Settings</span></a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <form role="form">
                        <div class="form-group">
                            <label for="email">Buttion Text:</label>
                            <input type="text" class="form-control" id="email" ng-model="lists.selected.data">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Link To:</label>
                            <select class="form-control chgimg" ng-change="chooseImage()" ng-model="opt">
                                <option value="web" selected="">Web Address</option>
                                <option value="file">File</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div ng-if="opt == 'web'">
                                <label for="pwd">Web Address(URL):</label>
                                <input type="text" class="form-control" id="pwd" ng-model="lists.selected.fileurl">
                            </div>
                            <div ng-if="opt == 'file'">
                                <label for="pwd">File URl(<a href="#" data-toggle="modal" data-target="#myModal">Change File</a>):</label>
                                <input type="text" class="form-control" id="pwd" ng-model="lists.selected.fileurl">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="profile">
                    <div class="row">
                        <label>Border:</label>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <select class="form-control" id="align" ng-change="applyStyle('border-style', lists.selected.cssstyle['border-style'])" ng-model="lists.selected.cssstyle['border-style']">
                                    <option value="none">None</option>
                                    <option value="solid">Solid</option>
                                    <option value="dotted">Dotted</option>
                                    <option value="double">Double</option>
                                    <option value="grove">Grove</option>
                                    <option value="ridge">Ridge</option>
                                    <option value="outset">Outset</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="col-lg-4 form-control" ng-change="applyStyle('border-width', lists.selected.cssstyle['border-width'])" ng-model="lists.selected.cssstyle['border-width']"/>
                            </div>
                            <div class="col-md-4 col-xs-11">
                                <input type="color" class="form-control" ng-change="applyStyle('border-color', lists.selected.cssstyle['border-color'])" ng-model="lists.selected.cssstyle['border-color']"/>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <label>Font:</label>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <select class="form-control" id="align" ng-change="applyStyle('font-family', lists.selected.cssstyle['font-family'])" ng-model="lists.selected.cssstyle['font-family']">
                                    <option value="Arial">Arial</option>
                                    <option value="sans-serif">sans-serif</option>
                                    <option value="monospace">monospace</option>
                                    <option value="Verdana">Verdana</option>
                                    <option value="Times New Roman">Times New Roman</option>
                                    <option value="calibri">calibri</option>
                                    <option value="Freestyle Script">Freestyle Script</option>
                                    <option value="Algerian">Algerian</option>
                                    <option value="Bell MT">Bell MT</option>
                                    <option value="Blackaeer ITC">Blackaeer ITC</option>
                                    <option value="Bradley Hand ITC">Bradley Hand ITC</option>
                                    <option value="CASTELLAR">CASTELLAR</option>
                                    <option value="chiller">chiller</option>
                                    <option value="curlz MT">curlz MT</option>
                                    <option value="Edwardian Script ITC">Edwardian Script ITC</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="col-lg-4 form-control" ng-change="applyStyle('font-size', lists.selected.cssstyle['font-size'])" ng-model="lists.selected.cssstyle['font-size']"/>
                            </div>
                            <div class="col-md-4 col-xs-11">
                                <input type="color" class="form-control" ng-change="applyStyle('color', lists.selected.cssstyle['color'])" ng-model="lists.selected.cssstyle['color']"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label>Background:</label>
                        <div class="form-group">                            
                            <div class="col-md-4 col-xs-11">
                                <input type="color" class="form-control" ng-change="applyStyle('background-color', lists.selected.cssstyle['background-color'])" ng-model="lists.selected.cssstyle['background-color']"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="message">
                    <div class="form-group">
                        <div>
                            <label>Align:</label>
                            <select class="form-control" id="align" ng-change="applyStyleToDiv('text-align', lists.selected.divcss['text-align'])" ng-model="lists.selected.divcss['text-align']">
                                <option value="center">Center</option>
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                            </select>
                        </div>
                        <div>
                            <label>Width</label>
                            <select class="form-control" id="width" ng-change="applyStyle('width', lists.selected.cssstyle['width'])" ng-model="lists.selected.cssstyle['width']">
                                <option value="">Fit to text</option>
                                <option value="100%">Full width</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div>
        <input type="button" class="btn btn-success col-sm-offset-8 col-sm-3" value="Save & Close" ng-click="rmRightMenu()"/>
    </div>

</div>
<div id="myModal" class="modal" role="dialog" style="">
    <div id="back" class="back"></div>
    <div id="front" class="front">
        <img src="<?php echo base_url() . 'template/user/images/animated.gif'; ?>" alt="processing"/>
    </div>

    <div class="modal-dialog col-lg-12" style="width: 100%;height: 100%;min-height: 100%;top:6%;bottom: 0px;position: fixed;padding: 0px; overflow: hidden">

        <!-- Modal content-->
        <div class="modal-content" style="max-height: 91%;min-height: 91%;overflow: scroll;background-color: whitesmoke">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Images</h4>
            </div>
            <div class="modal-body" >
                <div class="row">
                    <div class="fileUpload btn btn-info">
                        <span>Upload</span>
                        <input accept="image/*" type="file" class="upload" ng-file-select="onFileSelectInModel($files)" name="myfile"/>
                    </div>
                </div>
                <div class="row">
                    <div style="width: 17.1%;float: left;margin-right:2%;" ng-repeat="x in thumb">
                        <div class="gal-detail thumb col-sm-12">
                            <div style="text-align: center" class="row">
                                <div style="min-height: 169px;max-height: 169px;min-width: 221px;max-width: 221px;vertical-align: central">
                                    <a href="<?php echo base_url() . 'template/BasicTemplate/' . $userid . '/img/' ?>{{x}}"  class="image-popup" title="{{x}}">
                                        <img src="<?php echo base_url() . 'template/BasicTemplate/' . $userid . '/thumbnil/' ?>{{x}}" alt="{{x}}" style="max-height: 100%;min-height: 100%"/>
                                    </a>
                                    <br>
                                    <h5 title="{{x}}">
                                        <!--    {{x|limitTo:25}}{{x.length > 25 ? '...': '' }} -->
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="text-align: center">
                                    <input type="button" class="btn btn-success" value="Select" ng-click="selectImage(x)"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="alert-info" ng-if="thumb.length == 0">
                    No File in directory
                </div>
            </div>
        </div>

    </div>
</div>