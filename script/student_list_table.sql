USE [educationapp]
GO

/****** Object:  Table [dbo].[ad_assignments]    Script Date: 18-10-2019 09:32:34 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[student_table](
	[id] [int] IDENTITY(14,1) NOT NULL,
	[StudentNo] [int] NOT NULL,
	[TrafficNo] [int] NOT NULL,
	[TryFileNo] [int] NOT NULL,
	[NameEng] [nvarchar](150) NOT NULL,
	[eNameAr] [nvarchar](150) NOT NULL,
	[BranchNo] [int] NOT NULL,
 CONSTRAINT [PK_student_table] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.student_table' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'student_table'
GO


