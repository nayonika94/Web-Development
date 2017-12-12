<%@ Page Title="Dota2Info | Update" Language="VB" MasterPageFile="~/DotaMasterPage.master" AutoEventWireup="false" CodeFile="Update.aspx.vb" Inherits="Update" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <asp:ListView ID="ListView1" runat="server" DataSourceID="ObjectDataSource1" DataKeyNames="UID">
        <AlternatingItemTemplate>
            <span style="">UID:
                <asp:Label Text='<%# Eval("UID") %>' runat="server" ID="UIDLabel" /><br />
                Heading:
                <asp:Label Text='<%# Eval("Heading") %>' runat="server" ID="HeadingLabel" /><br />
                UpDetails:
                <asp:Label Text='<%# Eval("UpDetails") %>' runat="server" ID="UpDetailsLabel" /><br />
                <br />
            </span>
        </AlternatingItemTemplate>
        <EditItemTemplate>
            <span style="">UID:
                <asp:Label Text='<%# Eval("UID") %>' runat="server" ID="UIDLabel1" /><br />
                Heading:
                <asp:TextBox Text='<%# Bind("Heading") %>' runat="server" ID="HeadingTextBox" /><br />
                UpDetails:
                <asp:TextBox Text='<%# Bind("UpDetails") %>' runat="server" ID="UpDetailsTextBox" /><br />
                <asp:Button runat="server" CommandName="Update" Text="Update" ID="UpdateButton" /><asp:Button runat="server" CommandName="Cancel" Text="Cancel" ID="CancelButton" /><br />
                <br />
            </span>
        </EditItemTemplate>
        <EmptyDataTemplate>
            <span>No data was returned.</span>
        </EmptyDataTemplate>
        <InsertItemTemplate>
            <span style="">Heading:
                <asp:TextBox Text='<%# Bind("Heading") %>' runat="server" ID="HeadingTextBox" /><br />
                UpDetails:
                <asp:TextBox Text='<%# Bind("UpDetails") %>' runat="server" ID="UpDetailsTextBox" /><br />
                <asp:Button runat="server" CommandName="Insert" Text="Insert" ID="InsertButton" /><asp:Button runat="server" CommandName="Cancel" Text="Clear" ID="CancelButton" /><br />
                <br />
            </span>
        </InsertItemTemplate>
        <ItemTemplate>
            <span style="">UID:
                <asp:Label Text='<%# Eval("UID") %>' runat="server" ID="UIDLabel" /><br />
                Heading:
                <asp:Label Text='<%# Eval("Heading") %>' runat="server" ID="HeadingLabel" /><br />
                UpDetails:
                <asp:Label Text='<%# Eval("UpDetails") %>' runat="server" ID="UpDetailsLabel" /><br />
                <br />
            </span>
        </ItemTemplate>
        <LayoutTemplate>
            <div runat="server" id="itemPlaceholderContainer" style=""><span runat="server" id="itemPlaceholder" /></div>
            <div style="">
            </div>
        </LayoutTemplate>
        <SelectedItemTemplate>
            <span style="">UID:
                <asp:Label Text='<%# Eval("UID") %>' runat="server" ID="UIDLabel" /><br />
                Heading:
                <asp:Label Text='<%# Eval("Heading") %>' runat="server" ID="HeadingLabel" /><br />
                UpDetails:
                <asp:Label Text='<%# Eval("UpDetails") %>' runat="server" ID="UpDetailsLabel" /><br />
                <br />
            </span>
        </SelectedItemTemplate>
    </asp:ListView>
    <asp:ObjectDataSource runat="server" ID="ObjectDataSource1" DeleteMethod="Delete" InsertMethod="Insert" OldValuesParameterFormatString="original_{0}" SelectMethod="GetData" TypeName="Dota127TableAdapters.DotaUpdateTableAdapter" UpdateMethod="Update">
        <DeleteParameters>
            <asp:Parameter Name="Original_UID" Type="Int32"></asp:Parameter>
        </DeleteParameters>
        <InsertParameters>
            <asp:Parameter Name="Heading" Type="String"></asp:Parameter>
            <asp:Parameter Name="UpDetails" Type="String"></asp:Parameter>
        </InsertParameters>
        <UpdateParameters>
            <asp:Parameter Name="Heading" Type="String"></asp:Parameter>
            <asp:Parameter Name="UpDetails" Type="String"></asp:Parameter>
            <asp:Parameter Name="Original_UID" Type="Int32"></asp:Parameter>
        </UpdateParameters>
    </asp:ObjectDataSource>
</asp:Content>

