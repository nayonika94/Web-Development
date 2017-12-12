<%@ Page Title="Dota2Info|Characters" Language="VB" MasterPageFile="~/DotaMasterPage.master" AutoEventWireup="false" CodeFile="Character.aspx.vb" Inherits="Character" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <asp:Label ID="Label1" runat="server" Text="Character Guide" Font-Size="XX-Large"></asp:Label>
    <br />
    <br />
    <asp:DropDownList ID="DropDownList1" runat="server" DataSourceID="ObjectDataSource1" DataTextField="HeroName" DataValueField="HID" AppendDataBoundItems="True" AutoPostBack="True" Font-Size="X-Large" Height="40px" Width="276px">
        <asp:ListItem Value="0">Select a Hero</asp:ListItem>
    </asp:DropDownList>
    <asp:ObjectDataSource runat="server" ID="ObjectDataSource1" OldValuesParameterFormatString="original_{0}" SelectMethod="GetData" TypeName="Dota127TableAdapters.HeroTableAdapter"></asp:ObjectDataSource>
    <br />
    <br />
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" DataKeyNames="HID" DataSourceID="ObjectDataSource2" CellPadding="5" Height="277px" Width="699px">
        <Columns>
            <asp:BoundField DataField="HID" HeaderText="HID" ReadOnly="True" InsertVisible="False" SortExpression="HID"></asp:BoundField>
            <asp:BoundField DataField="HeroName" HeaderText="HeroName" SortExpression="HeroName"></asp:BoundField>
            <asp:BoundField DataField="Role" HeaderText="Role" SortExpression="Role"></asp:BoundField>
            <asp:BoundField DataField="Type" HeaderText="Type" SortExpression="Type"></asp:BoundField>
            <asp:BoundField DataField="Description" HeaderText="Description" SortExpression="Description"></asp:BoundField>
        </Columns>
        <RowStyle BorderStyle="Double" HorizontalAlign="Center" VerticalAlign="Middle" />
    </asp:GridView>
    <asp:ObjectDataSource runat="server" ID="ObjectDataSource2" OldValuesParameterFormatString="original_{0}" SelectMethod="GetDataByHID" TypeName="Dota127TableAdapters.HeroTableAdapter">
        <SelectParameters>
            <asp:ControlParameter ControlID="DropDownList1" PropertyName="SelectedValue" DefaultValue="0" Name="HID" Type="Int32"></asp:ControlParameter>
        </SelectParameters>
    </asp:ObjectDataSource>
    <br />
</asp:Content>

