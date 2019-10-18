USE [master]
GO
/****** Object:  Database [educationapp]    Script Date: 15-10-2019 11:34:18 AM ******/
CREATE DATABASE [educationapp]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'educationapp', FILENAME = N'C:\Program Files (x86)\Microsoft SQL Server\MSSQL12.SQLEXPRESS\MSSQL\DATA\educationapp.mdf' , SIZE = 3264KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'educationapp_log', FILENAME = N'C:\Program Files (x86)\Microsoft SQL Server\MSSQL12.SQLEXPRESS\MSSQL\DATA\educationapp_log.ldf' , SIZE = 1088KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [educationapp] SET COMPATIBILITY_LEVEL = 120
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
	EXEC [educationapp].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [educationapp] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [educationapp] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [educationapp] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [educationapp] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [educationapp] SET ARITHABORT OFF 
GO
ALTER DATABASE [educationapp] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [educationapp] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [educationapp] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [educationapp] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [educationapp] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [educationapp] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [educationapp] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [educationapp] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [educationapp] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [educationapp] SET  ENABLE_BROKER 
GO
ALTER DATABASE [educationapp] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [educationapp] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [educationapp] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [educationapp] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [educationapp] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [educationapp] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [educationapp] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [educationapp] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [educationapp] SET  MULTI_USER 
GO
ALTER DATABASE [educationapp] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [educationapp] SET DB_CHAINING OFF 
GO
ALTER DATABASE [educationapp] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [educationapp] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
ALTER DATABASE [educationapp] SET DELAYED_DURABILITY = DISABLED 
GO
USE [educationapp]
GO
/****** Object:  Schema [m2ss]    Script Date: 15-10-2019 11:34:18 AM ******/
CREATE SCHEMA [m2ss]
GO
/****** Object:  Table [dbo].[ad_assignments]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_assignments]
(
	[id] [int] IDENTITY(14,1) NOT NULL,
	[student_id] [int] NOT NULL,
	[course] [int] NOT NULL,
	[course_code] [nvarchar](200) NOT NULL,
	[status] [int] NOT NULL,
	[dated] [date] NOT NULL,
	[start_date] [nvarchar](150) NOT NULL,
	[end_date] [nvarchar](150) NOT NULL,
	[assigned_by] [int] NOT NULL,
	[created_on] [datetime2](0) NOT NULL,
	[slide_count] [nvarchar](200) NOT NULL,
	[lesson_count] [int] NOT NULL,
	[completed_lessons] [int] NOT NULL,
	[score] [nvarchar](150) NOT NULL,
	[language] [nvarchar](150) NOT NULL,
	CONSTRAINT [PK_ad_assignments_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[ad_course]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_course]
(
	[id] [int] IDENTITY(21,1) NOT NULL,
	[course_id] [nvarchar](200) NOT NULL,
	[course_name] [nvarchar](150) NOT NULL,
	[course_lang] [nvarchar](200) NOT NULL,
	[icon_file] [nvarchar](200) NOT NULL,
	[course_desc] [nvarchar](max) NOT NULL,
	[lesson_no] [int] NOT NULL,
	[created_on] [datetime2](0) NOT NULL DEFAULT (getdate()),
	[updated_on] [datetime2](0) NULL DEFAULT (NULL),
	[created_by] [bigint] NOT NULL,
	[updated_by] [int] NOT NULL,
	[publish_status] [int] NULL DEFAULT ((0)),
	CONSTRAINT [PK_ad_course_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[ad_lessons]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_lessons]
(
	[id] [int] IDENTITY(29,1) NOT NULL,
	[lesson_id] [nvarchar](200) NOT NULL,
	[lesson_name] [nvarchar](255) NOT NULL,
	[lesson_order] [int] NOT NULL,
	[icon_file] [nvarchar](200) NOT NULL,
	[course_id] [nvarchar](200) NOT NULL,
	[course_code] [nvarchar](200) NOT NULL,
	[language] [nvarchar](50) NULL DEFAULT (NULL),
	[publish_status] [int] NULL DEFAULT ((0)),
	[lesson_version] [int] NULL DEFAULT ((1)),
	[created_on] [datetime2](0) NOT NULL DEFAULT (getdate()),
	[updated_on] [datetime2](0) NULL DEFAULT (getdate()),
	[updated_by] [int] NOT NULL,
	[created_by] [bigint] NOT NULL DEFAULT ((1)),
	CONSTRAINT [PK_ad_lessons_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[ad_quiz]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_quiz]
(
	[quiz_id] [int] IDENTITY(22,1) NOT NULL,
	[lessonid] [int] NOT NULL,
	[quiz_type] [nvarchar](20) NULL DEFAULT (NULL),
	[question] [nvarchar](max) NULL,
	[trueorfalse] [nvarchar](20) NULL DEFAULT (NULL),
	[mediatype] [nvarchar](20) NULL DEFAULT (NULL),
	[upload_media] [nvarchar](max) NULL,
	[right_answer] [nvarchar](max) NULL,
	[drag_drop] [nvarchar](max) NULL,
	[reorder] [nvarchar](max) NULL,
	[created_on] [datetime2](0) NULL DEFAULT (getdate()),
	[created_by] [int] NULL DEFAULT (NULL),
	[updated_on] [datetime2](0) NULL DEFAULT (NULL),
	[updated_by] [int] NULL DEFAULT (NULL),
	[publish_status] [int] NOT NULL DEFAULT ((0)),
	CONSTRAINT [PK_ad_quiz_quiz_id] PRIMARY KEY CLUSTERED 
(
	[quiz_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[ad_slide_comments]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ad_slide_comments]
(
	[id] [bigint] IDENTITY(21,1) NOT NULL,
	[slide_id] [bigint] NOT NULL,
	[comment] [varchar](max) NOT NULL,
	[status] [int] NOT NULL DEFAULT ((0)),
	[admin_status] [int] NOT NULL DEFAULT ((0)),
	[added_by] [bigint] NOT NULL,
	[updated_at] [datetime] NOT NULL DEFAULT (getdate()),
	[created_at] [datetime] NOT NULL DEFAULT (getdate()),
	CONSTRAINT [PK_ad_slide_comments_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ad_slides]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_slides]
(
	[id] [int] IDENTITY(22,1) NOT NULL,
	[lesson_id] [int] NOT NULL,
	[slide_title] [nvarchar](150) NOT NULL,
	[slide_mode] [nvarchar](50) NOT NULL,
	[slide_file] [nvarchar](255) NOT NULL,
	[slide_description] [nvarchar](max) NOT NULL,
	[slide_duration] [nvarchar](15) NOT NULL,
	[slide_order] [int] NOT NULL,
	[created_by] [int] NOT NULL,
	[created_on] [datetime2](0) NOT NULL DEFAULT (getdate()),
	[updated_by] [int] NULL DEFAULT (NULL),
	[updated_on] [datetime2](0) NOT NULL DEFAULT (getdate()),
	[publish_status] [int] NOT NULL DEFAULT ((0)),
	CONSTRAINT [PK_ad_slides_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[ad_staff]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_staff]
(
	[id] [int] IDENTITY(12,1) NOT NULL,
	[name] [nvarchar](150) NOT NULL,
	[email] [nvarchar](200) NOT NULL,
	[password] [nvarchar](250) NOT NULL,
	[contact_number] [nvarchar](15) NOT NULL,
	[role] [int] NOT NULL,
	[remember_me] [int] NOT NULL CONSTRAINT [remember_me]  DEFAULT ((0)),
	[remember_token] [nvarchar](210) NOT NULL CONSTRAINT [remember_token1]  DEFAULT ((0)),
	[last_login] [datetime2](0) NOT NULL DEFAULT (getdate()),
	[created_time] [datetime2](0) NOT NULL DEFAULT (getdate()),
	CONSTRAINT [PK_ad_staff_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[ad_student]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_student]
(
	[id] [int] IDENTITY(17,1) NOT NULL,
	[name] [nvarchar](150) NOT NULL,
	[student_idno] [nvarchar](100) NULL DEFAULT (NULL),
	[trafficNumber] [nvarchar](100) NOT NULL,
	[fileNumber] [nvarchar](100) NOT NULL,
	[emirates_idno] [nvarchar](100) NULL DEFAULT (NULL),
	[email] [nvarchar](200) NOT NULL,
	[password] [nvarchar](250) NOT NULL CONSTRAINT [col_c_def]  DEFAULT ('password123'),
	[contact_number] [nvarchar](15) NOT NULL,
	[role] [int] NOT NULL,
	[no_of_lessons] [int] NOT NULL,
	[vip] [smallint] NOT NULL,
	[remember_me] [int] NOT NULL CONSTRAINT [col_d_def]  DEFAULT ((0)),
	[remember_token] [text] NULL,
	[last_login] [datetime2](0) NOT NULL DEFAULT (getdate()),
	[created_time] [datetime2](0) NOT NULL DEFAULT (getdate()),
	CONSTRAINT [PK_ad_student_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[employee_list]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[employee_list]
(
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[Emp_no] [int] NULL,
	[UserName] [nvarchar](50) NULL,
	[Name] [nvarchar](50) NULL,
	CONSTRAINT [PK_employee_list] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[notifications]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[notifications]
(
	[id] [bigint] IDENTITY(165,1) NOT NULL,
	[user] [bigint] NOT NULL,
	[name] [varchar](225) NOT NULL,
	[user_type] [varchar](200) NULL,
	[type] [text] NULL,
	[notify_to] [bigint] NULL CONSTRAINT [col_b_def]  DEFAULT ((0)),
	[course] [text] NULL,
	[status] [varchar](200) NULL DEFAULT (N'0'),
	[url] [text] NULL,
	[created_at] [datetime] NOT NULL DEFAULT (getdate()),
	CONSTRAINT [PK_notifications_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Table_Lesson]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Table_Lesson]
(
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[Code] [varchar](max) NULL,
	[Description] [varchar](max) NULL,
	CONSTRAINT [PK_Table_Lesson] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
ALTER TABLE [dbo].[ad_assignments] ADD  DEFAULT ((0)) FOR [status]
GO
ALTER TABLE [dbo].[ad_assignments] ADD  DEFAULT (getdate()) FOR [created_on]
GO
/****** Object:  StoredProcedure [dbo].[_sp_el_employees]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[_sp_el_employees]
-- Add the parameters for the stored procedure here
--<@Param1, sysname, @p1> <Datatype_For_Param1, , int> = <Default_Value_For_Param1, , 0>, 
--<@Param2, sysname, @p2> <Datatype_For_Param2, , int> = <Default_Value_For_Param2, , 0>
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

	-- Insert statements for procedure here
	SELECT Emp_no, UserName, Name
	from employee_list;
END

GO
/****** Object:  StoredProcedure [dbo].[_sp_el_lessons]    Script Date: 15-10-2019 11:34:18 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[_sp_el_lessons]
-- Add the parameters for the stored procedure here
--<@Param1, sysname, @p1> <Datatype_For_Param1, , int> = <Default_Value_For_Param1, , 0>, 
--<@Param2, sysname, @p2> <Datatype_For_Param2, , int> = <Default_Value_For_Param2, , 0>
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

	-- Insert statements for procedure here
	SELECT Code, Description
	FROM dbo.Table_Lesson
END

GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.ad_assignments' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'ad_assignments'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.ad_course' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'ad_course'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.ad_lessons' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'ad_lessons'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.ad_quiz' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'ad_quiz'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.ad_slide_comments' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'ad_slide_comments'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.ad_slides' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'ad_slides'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.ad_staff' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'ad_staff'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.ad_student' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'ad_student'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.notifications' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'notifications'
GO
USE [master]
GO
ALTER DATABASE [educationapp] SET  READ_WRITE 
GO
