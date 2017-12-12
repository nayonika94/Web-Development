<%@ Page Title="Dota2Info | Home" Language="VB" MasterPageFile="~/DotaMasterPage.master" AutoEventWireup="false" CodeFile="Home.aspx.vb" Inherits="Home" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <asp:Label ID="Label3" runat="server" Text="Welcome!" Font-Size="X-Large"></asp:Label>
    <br />
    <br />
    <asp:Label ID="Label1" runat="server" Text="Search Role" BorderStyle="None"></asp:Label>
&nbsp;<asp:TextBox ID="TextBox1" runat="server" Width="205px"></asp:TextBox>
&nbsp;&nbsp;
    <asp:Label ID="Label2" runat="server" Text="Search Hero"></asp:Label>
&nbsp;
    <asp:TextBox ID="TextBox2" runat="server" Width="205px"></asp:TextBox>

    &nbsp;

    <asp:Button ID="Button1" runat="server" Text="Search" BorderStyle="Groove" Height="25px" />
    <br />
    <br />
    <asp:GridView ID="GridView2" runat="server" AllowPaging="True" AutoGenerateColumns="False" DataKeyNames="HID" DataSourceID="ObjectDataSource2" Height="184px" Width="739px">
        <Columns>
            <asp:BoundField DataField="HeroName" HeaderText="HeroName" SortExpression="HeroName" />
            <asp:BoundField DataField="Role" HeaderText="Role" SortExpression="Role" />
            <asp:BoundField DataField="Type" HeaderText="Type" SortExpression="Type" />
            <asp:BoundField DataField="Description" HeaderText="Description" SortExpression="Description" />
        </Columns>
    </asp:GridView>
    <asp:ObjectDataSource ID="ObjectDataSource2" runat="server" DeleteMethod="Delete" InsertMethod="Insert" OldValuesParameterFormatString="original_{0}" SelectMethod="GetDataByRole" TypeName="Dota127TableAdapters.HeroTableAdapter" UpdateMethod="Update">
        <DeleteParameters>
            <asp:Parameter Name="Original_HID" Type="Int32" />
        </DeleteParameters>
        <InsertParameters>
            <asp:Parameter Name="HeroName" Type="String" />
            <asp:Parameter Name="Role" Type="String" />
            <asp:Parameter Name="Type" Type="String" />
            <asp:Parameter Name="Description" Type="String" />
        </InsertParameters>
        <SelectParameters>
            <asp:ControlParameter ControlID="TextBox1" DefaultValue="%" Name="Role" PropertyName="Text" Type="String" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="HeroName" Type="String" />
            <asp:Parameter Name="Role" Type="String" />
            <asp:Parameter Name="Type" Type="String" />
            <asp:Parameter Name="Description" Type="String" />
            <asp:Parameter Name="Original_HID" Type="Int32" />
        </UpdateParameters>
    </asp:ObjectDataSource>
    <asp:GridView ID="GridView1" runat="server" AllowPaging="True" AutoGenerateColumns="False" DataKeyNames="HID" DataSourceID="ObjectDataSource1" Height="234px" Width="743px">
        <Columns>
            <asp:BoundField DataField="HeroName" HeaderText="HeroName" SortExpression="HeroName" />
            <asp:BoundField DataField="Role" HeaderText="Role" SortExpression="Role" />
            <asp:BoundField DataField="Type" HeaderText="Type" SortExpression="Type" />
            <asp:BoundField DataField="Description" HeaderText="Description" SortExpression="Description" />
        </Columns>
    </asp:GridView>
    <asp:ObjectDataSource ID="ObjectDataSource1" runat="server" OldValuesParameterFormatString="original_{0}" SelectMethod="GetDataByHeroName" TypeName="Dota127TableAdapters.HeroTableAdapter">
        <SelectParameters>
            <asp:ControlParameter ControlID="TextBox2" DefaultValue="%" Name="HeroName" PropertyName="Text" Type="String" />
        </SelectParameters>
    </asp:ObjectDataSource>
    <br />


</asp:Content>

