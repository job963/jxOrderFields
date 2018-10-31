[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript" src="[{$oViewConf->getModuleUrl('jxtools','out/admin/src/clipboardjs/dist/clipboard.min.js')}]"></script>

<script type="text/javascript">
    new Clipboard('.btn');
</script>


<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="jxtgenuid">
</form>


<h1>[{ oxmultilang ident="JXTOOLS_GENUID_TITLE" }]</h1>
    <div style="position:absolute;top:4px;right:8px;color:gray;font-size:0.9em;border:1px solid gray;border-radius:3px;">
        &nbsp;[{$sModuleId}]&nbsp;[{$sModuleVersion}]&nbsp;
    </div>
               
    <div id="liste" style="border:0px solid gray; margin-left:0px; width:30%;">
        <div style="height: 24px;"></div>
            
        <table cellspacing="0" cellpadding="0" border="0" [{*width="98%"*}]>
            <thead>
                <tr>
                    <td class="listheader" style="width: 15%;" id="headcol1">&nbsp;[{ oxmultilang ident="JXTOOLS_UIDS" }]</td>
                    <td class="listheader" style="width: 5%;" id="headcol2">&nbsp;[{ oxmultilang ident="JXTOOLS_COPY" }]</td>
                </tr
            </thead>
            
            <tbody style="width:100%;overflow:scroll;">
            [{foreach item=sUid from=$aUids}]
                [{ cycle values="listitem,listitem2" assign="listclass" }]
                <tr>
                    <td class="[{ $listclass }]" style="height: 15px;" id="bodycol1">&nbsp;<nobr>[{$sUid}]</nobr></td>
                    <td class="[{ $listclass }]" style="width: 5%;" id="bodycol2">
                        <button class="btn" data-clipboard-text="[{$sUid}]" style="margin-left:8px; margin-top:2px; margin-bottom:2px;">
                            <img src="[{$oViewConf->getModuleUrl('jxtools','out/admin/src/octicons/svg/clippy.svg')}]" alt="Copy to clipboard">
                        </button>
                    </td>
                </tr>
            [{/foreach}]
            </tbody>
        </table>
    </div>

[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]

