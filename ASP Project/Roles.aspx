<%@ Page Title="Dota2Info | Roles" Language="VB" MasterPageFile="~/DotaMasterPage.master" AutoEventWireup="false" CodeFile="Roles.aspx.vb" Inherits="Roles" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <br />
    <asp:Label ID="Label3" runat="server" Text="Select a Role" Font-Size="X-Large" ></asp:Label>
    <br />
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" DataKeyNames="RoleID" DataSourceID="ObjectDataSource1" AllowPaging="True" Height="401px" Width="751px">
        <Columns>
            <asp:CommandField ShowSelectButton="True"></asp:CommandField>
            <asp:BoundField DataField="Role" HeaderText="Role" SortExpression="Role"></asp:BoundField>
            <asp:BoundField DataField="RoleDetail" HeaderText="RoleDetail" SortExpression="RoleDetail"></asp:BoundField>
        </Columns>
    </asp:GridView>
    <br />
    <asp:ObjectDataSource runat="server" ID="ObjectDataSource1" OldValuesParameterFormatString="original_{0}" SelectMethod="GetData" TypeName="Dota127TableAdapters.RoleTableAdapter"></asp:ObjectDataSource>
    <br />
</asp:Content>

