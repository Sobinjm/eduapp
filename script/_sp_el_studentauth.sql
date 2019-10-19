-- ================================================
-- Template generated from Template Explorer using:
-- Create Procedure (New Menu).SQL
--
-- Use the Specify Values for Template Parameters 
-- command (Ctrl-Shift-M) to fill in the parameter 
-- values below.
--
-- This block of comments will not be included in
-- the definition of the procedure.
-- ================================================
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE _sp_el_studentauth 
	-- Add the parameters for the stored procedure here
	 @StudentNo int ,
     @TrafficNo nvarchar(18),
     @fileNo nvarchar(18),
     @BranchNo int

AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	SELECT StudentNo,NameEng,NameAr,EmiratesID,TrafficNo,TryFileNo from student_list where StudentNo=@StudentNo AND TrfficNo=@TrafficNo AND TryFileNo=@fileNo AND BranchNo=@BranchNo ;
END
GO
