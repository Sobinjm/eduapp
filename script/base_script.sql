USE [master]
GO
/****** Object:  Database [educationapp]    Script Date: 11-10-2019 05:02:01 PM ******/
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
/****** Object:  Schema [m2ss]    Script Date: 11-10-2019 05:02:01 PM ******/
CREATE SCHEMA [m2ss]
GO
/****** Object:  Table [dbo].[ad_assignments]    Script Date: 11-10-2019 05:02:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_assignments](
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
/****** Object:  Table [dbo].[ad_course]    Script Date: 11-10-2019 05:02:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_course](
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
/****** Object:  Table [dbo].[ad_lessons]    Script Date: 11-10-2019 05:02:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_lessons](
	[id] [int] IDENTITY(29,1) NOT NULL,
	[lesson_id] [nvarchar](200) NOT NULL,
	[lesson_name] [nvarchar](255) NOT NULL,
	[lesson_order] [int] NOT NULL,
	[icon_file] [nvarchar](200) NOT NULL,
	[course_id] [nvarchar](200) NOT NULL,
	[course_code] [nvarchar](200) NOT NULL,
	[language] [nvarchar](50) NULL DEFAULT (NULL),
	[publish_status] [int] NULL DEFAULT ((0)),
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
/****** Object:  Table [dbo].[ad_quiz]    Script Date: 11-10-2019 05:02:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_quiz](
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
/****** Object:  Table [dbo].[ad_slide_comments]    Script Date: 11-10-2019 05:02:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ad_slide_comments](
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
/****** Object:  Table [dbo].[ad_slides]    Script Date: 11-10-2019 05:02:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_slides](
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
/****** Object:  Table [dbo].[ad_staff]    Script Date: 11-10-2019 05:02:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_staff](
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
/****** Object:  Table [dbo].[ad_student]    Script Date: 11-10-2019 05:02:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ad_student](
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
/****** Object:  Table [dbo].[notifications]    Script Date: 11-10-2019 05:02:01 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[notifications](
	[id] [bigint] IDENTITY(165,1) NOT NULL,
	[user] [bigint] NOT NULL,
	[name] [varchar](225) NOT NULL,
	[user_type] [varchar](200) NOT NULL,
	[type] [text] NULL,
	[notify_to] [bigint] NOT NULL CONSTRAINT [col_b_def]  DEFAULT ((0)),
	[course] [text] NULL,
	[status] [varchar](200) NOT NULL DEFAULT (N'0'),
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
SET IDENTITY_INSERT [dbo].[ad_course] ON 

INSERT [dbo].[ad_course] ([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status]) VALUES (2, N'RHDL', N'Right hand driving lessons', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/154746301422071.jpg', N'', 18, CAST(N'2019-01-14 16:20:14.0000000' AS DateTime2), CAST(N'2019-01-14 16:20:14.0000000' AS DateTime2), 2, 1, 2)
INSERT [dbo].[ad_course] ([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status]) VALUES (6, N'', N'Security Driver Test - New', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/154752657731949.jpg', N'', 5, CAST(N'2019-01-15 09:59:37.0000000' AS DateTime2), CAST(N'2019-01-14 16:27:17.0000000' AS DateTime2), 2, 1, 2)
INSERT [dbo].[ad_course] ([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status]) VALUES (7, N'', N'Speed Test Lessons', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/154754805221891.jpg', N'', 10, CAST(N'2019-01-15 15:57:32.0000000' AS DateTime2), CAST(N'2019-01-14 16:27:17.0000000' AS DateTime2), 2, 1, 2)
INSERT [dbo].[ad_course] ([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status]) VALUES (9, N'7', N'Left hand driving', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/154781094229202.png', N'<p>Left hand</p>
', 8, CAST(N'2019-01-14 16:27:17.0000000' AS DateTime2), CAST(N'2019-01-14 16:27:17.0000000' AS DateTime2), 2, 1, 0)
INSERT [dbo].[ad_course] ([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status]) VALUES (14, N'', N'sample course', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/15576128092034151146.jpg', N'', 5, CAST(N'2019-05-12 03:43:29.0000000' AS DateTime2), NULL, 1, 1, 2)
INSERT [dbo].[ad_course] ([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status]) VALUES (15, N'', N'10', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/1557862462404281895.jpg', N'', 5, CAST(N'2019-05-15 01:04:22.0000000' AS DateTime2), NULL, 1, 0, 0)
INSERT [dbo].[ad_course] ([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status]) VALUES (16, N'', N'Heavy Vehicle', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/1557862763611838044.jpg', N'', 5, CAST(N'2019-05-15 01:09:23.0000000' AS DateTime2), NULL, 1, 1, 0)
INSERT [dbo].[ad_course] ([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status]) VALUES (17, N'IP0', N'School Bus Driver', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/155786284358927038.jpg', N'<p>testing desc</p>
', 10, CAST(N'2019-05-15 01:10:43.0000000' AS DateTime2), NULL, 1, 1, 0)
INSERT [dbo].[ad_course] ([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status]) VALUES (19, N'8', N'No License', N'{"english":"1","arabic":"1","urdu":"0","pashto":"0","malayalam":"1"}', N'content/uploads/course/1559020844433397255.jpg', N'<p>Demo Description</p>
', 8, CAST(N'2019-05-28 10:50:44.0000000' AS DateTime2), NULL, 1, 1, 0)
INSERT [dbo].[ad_course] ([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status]) VALUES (20, N'1', N'Motor Cycle', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/15604998852011980523.png', N'<p>New Comment</p>
', 5, CAST(N'2019-06-14 13:41:25.0000000' AS DateTime2), NULL, 1, 1, 0)
SET IDENTITY_INSERT [dbo].[ad_course] OFF
SET IDENTITY_INSERT [dbo].[ad_lessons] ON 

INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (2, N'IN', N'Introduction', 1, N'content/uploads/lessons/154833124221808.jpg', N'9', N'7', N'english', 2, CAST(N'2019-01-24 11:49:51.0000000' AS DateTime2), CAST(N'2019-06-14 14:19:57.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (3, N'CO', N'Course Overview', 2, N'content/uploads/lessons/154832285614613.jpg', N'9', N'7', N'english', 2, CAST(N'2019-01-24 15:10:56.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:01.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (4, N'LHDAI', N'Left Hand Driving - An Introduction', 3, N'content/uploads/lessons/15483229653431.jpg', N'9', N'7', N'english', 2, CAST(N'2019-01-24 15:12:45.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:06.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (5, N'', N'ഇടതു കൈ കൊണ്ടുപോകൽ - ഒരു ആമുഖം', 3, N'content/uploads/lessons/15483247133005.jpg', N'9', N'7', N'malayalam', 2, CAST(N'2019-01-24 15:41:53.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:11.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (6, N'', N'കോഴ്സ് അവലോകനം', 2, N'content/uploads/lessons/15483247632858.jpg', N'9', N'7', N'malayalam', 2, CAST(N'2019-01-24 15:42:43.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:15.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (7, N'', N'ആമുഖം', 1, N'content/uploads/lessons/15483247944772.jpg', N'9', N'7', N'malayalam', 2, CAST(N'2019-01-24 15:43:14.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:19.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (8, N'', N'Lession 1 testing2', 1, N'content/uploads/lessons/15527177701572905319.gif', N'10', N'', N'english', 0, CAST(N'2019-03-16 11:59:30.0000000' AS DateTime2), NULL, 0, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (9, N'', N'Lesson 4', 4, N'content/uploads/lessons/15528994871551210041.gif', N'11', N'', N'english', 0, CAST(N'2019-03-18 14:28:07.0000000' AS DateTime2), NULL, 2, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (15, N'llp', N'sdfhdsifsfsdfds', 1, N'content/uploads/lessons/1553462489532932530.jpg', N'2', N'RHDL', N'english', 0, CAST(N'2019-03-25 02:51:29.0000000' AS DateTime2), CAST(N'2019-05-15 08:29:14.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (16, N'llp2', N'fsdfsdfsdfds', 2, N'content/uploads/lessons/15534626841914808894.jpg', N'2', N'RHDL', N'english', 0, CAST(N'2019-03-25 02:54:44.0000000' AS DateTime2), CAST(N'2019-05-15 08:29:21.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (17, N'', N'new tresting lesson', 4, N'content/uploads/lessons/1553579509633819815.jpg', N'10', N'', N'english', 0, CAST(N'2019-03-26 11:21:49.0000000' AS DateTime2), NULL, 0, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (20, N'', N'Malayalam lesson1', 1, N'content/uploads/lessons/15535889241978715674.jpg', N'10', N'', N'malayalam', 0, CAST(N'2019-03-26 13:58:44.0000000' AS DateTime2), NULL, 0, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (21, N'', N'testing lesson', 4, N'content/uploads/lessons/155393188969245475.jpg', N'7', N'', N'english', 0, CAST(N'2019-03-30 13:14:49.0000000' AS DateTime2), NULL, 2, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (22, N'', N'lesson 2', 3, N'content/uploads/lessons/15539665431233388004.jpg', N'7', N'', N'english', 0, CAST(N'2019-03-30 22:52:23.0000000' AS DateTime2), NULL, 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (24, N'4PD', N'4X4 Practical Discount', 2, N'content/uploads/lessons/15578636521289686309.jpg', N'17', N'', N'english', 0, CAST(N'2019-05-15 01:24:12.0000000' AS DateTime2), CAST(N'2019-05-19 15:32:58.0000000' AS DateTime2), 2, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (25, N'L17', N'Lesson 17', 5, N'content/uploads/lessons/1559020890831900105.jpg', N'19', N'', N'english', 0, CAST(N'2019-05-28 10:51:30.0000000' AS DateTime2), CAST(N'2019-05-28 10:51:30.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (26, N'4DW', N'4X4 Prctcl Wknd Discount', 1, N'content/uploads/lessons/15599897582036297500.jpg', N'19', N'', N'arabic', 0, CAST(N'2019-06-08 15:59:18.0000000' AS DateTime2), CAST(N'2019-06-08 15:59:18.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (27, N'4DW', N'4X4 Prctcl Wknd Discount', 1, N'content/uploads/lessons/1560501103221219511.png', N'20', N'', N'english', 0, CAST(N'2019-06-14 14:01:43.0000000' AS DateTime2), CAST(N'2019-06-14 14:01:43.0000000' AS DateTime2), 1, 1)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by]) VALUES (28, N'4PD', N'4X4 Practical Discount', 2, N'content/uploads/lessons/15605020141588887788.png', N'20', N'1', N'english', 0, CAST(N'2019-06-14 14:16:54.0000000' AS DateTime2), CAST(N'2019-06-14 14:16:54.0000000' AS DateTime2), 1, 1)
SET IDENTITY_INSERT [dbo].[ad_lessons] OFF
SET IDENTITY_INSERT [dbo].[ad_quiz] ON 

INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (2, 2, N'true_or_false', N'Driving automation helps newbie drivers drive fast?', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (3, 2, N'true_or_false', N'Driving relaxation course helps learners know the basics of relaxation during driving.', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (4, 2, N'true_or_false', N'Does piano music relax mind?', N'false', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (5, 2, N'true_or_false', N'You should hold your steering wheel at 90-degree angle?', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (6, 2, N'right_answer', N'Which car is best for driving?', NULL, N'image', N'content/uploads/quiz/image/15517003199744.jpg', N'{"a":{"question":"Maruthi Alto","answer":"yes"},"b":{"question":"Suzuki Baleno","answer":"no"},"c":{"question":"Scorpio","answer":"no"},"d":{"question":"Lamborghini","answer":"no"}}', NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (7, 2, N'right_answer', N'What are the main objectives of this course introduction?', NULL, N'image', N'content/uploads/quiz/image/2155176416220691.jpg', N'{"a":{"question":"Course introduction one","answer":"no"},"b":{"question":"Descriptions for testing","answer":"no"},"c":{"question":"Course overview developments","answer":"yes"},"d":{"question":"Steering wheels resolutions","answer":"no"}}', NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (8, 3, N'drag_and_drop', NULL, NULL, NULL, NULL, NULL, N'{"question_one":{"question":"Four wheeler has :","matching_answer":"4 Wheels"},"question_two":{"question":"Bike has :","matching_answer":"2 Wheels"},"question_three":{"question":"Cycle has:","matching_answer":"2 Wheels run by chain"}}', NULL, CAST(N'2019-03-05 11:34:27.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (9, 8, N'reorder', NULL, NULL, NULL, NULL, NULL, NULL, N'{"1":"Before crossing see left and right","2":"Wait for traffic signal to turn green","3":"Make sure there is no vehicle speeding both sides","4":"Now you can cross the road"}', CAST(N'2019-03-05 12:12:52.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (10, 8, N'true_or_false', N'testing question', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-16 12:05:00.0000000' AS DateTime2), 2, NULL, 2, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (11, 2, N'drag_and_drop', NULL, NULL, NULL, NULL, NULL, N'{"question_one":{"question":"quest 1","matching_answer":"ans 1"},"question_two":{"question":"quest2","matching_answer":"ans2"},"question_three":{"question":"quest 3","matching_answer":"ans3"}}', NULL, CAST(N'2019-03-16 12:17:46.0000000' AS DateTime2), 2, NULL, 2, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (12, 2, N'drag_and_drop', NULL, NULL, NULL, NULL, NULL, N'{"question_one":{"question":"quest 1","matching_answer":"ans 1"},"question_two":{"question":"quest2","matching_answer":"ans2"},"question_three":{"question":"quest 3","matching_answer":"ans3"}}', NULL, CAST(N'2019-03-19 12:54:32.0000000' AS DateTime2), 2, NULL, 2, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (13, 7, N'true_or_false', N'erydyr', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:46:35.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (14, 10, N'true_or_false', N'helloooo', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:48:32.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (15, 10, N'true_or_false', N'ggggggggggggggggg', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:49:12.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (16, 10, N'true_or_false', N'hello', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:56:20.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (17, 8, N'true_or_false', N'testing quiz english', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-26 22:10:33.0000000' AS DateTime2), 0, NULL, 0, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (18, 21, N'true_or_false', N'testing quiz lesson1', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-30 22:55:02.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (19, 22, N'true_or_false', N'dsfsfsfsf', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-30 23:02:09.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (20, 3, N'true_or_false', N'yyyyyyyyy', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-04-01 18:27:19.0000000' AS DateTime2), 0, NULL, 0, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (21, 21, N'right_answer', N'ttttttttttttt', NULL, N'video', N'content/uploads/quiz/video/211554128480741660032.mp4', N'{"a":{"question":"q1","answer":"no"},"b":{"question":"q2","answer":"no"},"c":{"question":"q3","answer":"yes"},"d":{"question":"q4","answer":"no"}}', NULL, NULL, CAST(N'2019-04-01 19:51:20.0000000' AS DateTime2), 0, NULL, 0, 0)
SET IDENTITY_INSERT [dbo].[ad_quiz] OFF
SET IDENTITY_INSERT [dbo].[ad_slide_comments] ON 

INSERT [dbo].[ad_slide_comments] ([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at]) VALUES (13, 6, N'new comment', 0, 0, 1, CAST(N'2019-05-11 17:49:01.000' AS DateTime), CAST(N'2019-03-24 17:19:10.000' AS DateTime))
INSERT [dbo].[ad_slide_comments] ([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at]) VALUES (14, 6, N'testing comment 123', 0, 0, 1, CAST(N'2019-05-11 17:49:04.000' AS DateTime), CAST(N'2019-03-25 02:01:45.000' AS DateTime))
INSERT [dbo].[ad_slide_comments] ([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at]) VALUES (15, 16, N'testing comment', 1, 0, 1, CAST(N'2019-05-19 14:32:55.000' AS DateTime), CAST(N'2019-04-22 11:40:01.000' AS DateTime))
INSERT [dbo].[ad_slide_comments] ([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at]) VALUES (16, 16, N'test comment', 1, 0, 1, CAST(N'2019-05-19 14:52:48.000' AS DateTime), CAST(N'2019-05-01 10:20:57.000' AS DateTime))
INSERT [dbo].[ad_slide_comments] ([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at]) VALUES (17, 16, N'second test comment', 0, 0, 1, CAST(N'2019-05-11 17:49:15.000' AS DateTime), CAST(N'2019-05-01 10:27:33.000' AS DateTime))
INSERT [dbo].[ad_slide_comments] ([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at]) VALUES (18, 3, N'testing comment', 1, 0, 1, CAST(N'2019-05-20 11:02:45.000' AS DateTime), CAST(N'2019-05-11 17:50:11.000' AS DateTime))
INSERT [dbo].[ad_slide_comments] ([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at]) VALUES (19, 1, N'Testing Comment noti', 1, 0, 1, CAST(N'2019-05-20 00:43:49.000' AS DateTime), CAST(N'2019-05-20 00:22:20.000' AS DateTime))
INSERT [dbo].[ad_slide_comments] ([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at]) VALUES (20, 1, N'Testing comment new', 0, 0, 1, CAST(N'2019-05-20 00:24:42.000' AS DateTime), CAST(N'2019-05-20 00:24:42.000' AS DateTime))
SET IDENTITY_INSERT [dbo].[ad_slide_comments] OFF
SET IDENTITY_INSERT [dbo].[ad_slides] ON 

INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (3, 2, N'Piano - Driving Relaxation', N'audio', N'content/uploads/slide/audio/2155003715622394.mp3', N'Piano - Introduction Piano introduction course.', N'04:00', 4, 1, CAST(N'2019-02-13 11:22:36.0000000' AS DateTime2), NULL, CAST(N'2019-05-28 12:00:05.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (4, 2, N'How to hold your steering wheel', N'image', N'content/uploads/slide/image/2155133492010408.jpg', N'Steering Wheels:

How to hold your steering wheel. This is a sample course.', N'00:00', 5, 1, CAST(N'2019-02-28 11:52:00.0000000' AS DateTime2), NULL, CAST(N'2019-05-28 12:37:04.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (5, 3, N'Introduction to course overview', N'image', N'content/uploads/slide/image/3155176130419019.jpg', N'Introduction to course overview,  This is a text summary for testing.', N'01:18', 1, 1, CAST(N'2019-03-05 10:18:24.0000000' AS DateTime2), NULL, CAST(N'2019-03-05 10:18:24.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (6, 8, N'testing slide', N'video', N'content/uploads/slide/video/815527178661239583855.mp4', N'testing video slide', N'20', 1, 2, CAST(N'2019-03-16 12:01:06.0000000' AS DateTime2), NULL, CAST(N'2019-03-16 12:01:06.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (7, 8, N'Image slide 1', N'image', N'content/uploads/slide/image/815527179191734341785.gif', N'testing image slide', N'10', 1, 2, CAST(N'2019-03-16 12:01:59.0000000' AS DateTime2), NULL, CAST(N'2019-03-16 12:01:59.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (8, 9, N'Slide 3', N'image', N'content/uploads/slide/image/91552899535610176411.gif', N'testing slide', N'10', 3, 2, CAST(N'2019-03-18 14:28:55.0000000' AS DateTime2), NULL, CAST(N'2019-03-18 14:28:55.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (9, 9, N'slide1', N'image', N'content/uploads/slide/image/91552899568356902453.gif', N'testing slide 1', N'50', 1, 2, CAST(N'2019-03-18 14:29:28.0000000' AS DateTime2), NULL, CAST(N'2019-03-18 14:29:28.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (10, 9, N'test', N'video', N'content/uploads/slide/video/91553399585409307537.mp4', N'test', N'20', 5, 0, CAST(N'2019-03-24 09:23:05.0000000' AS DateTime2), NULL, CAST(N'2019-03-24 09:23:05.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (11, 9, N'test1212', N'video', N'content/uploads/slide/video/915533999812004662277.mp4', N'desc', N'50', 10, 0, CAST(N'2019-03-24 09:29:41.0000000' AS DateTime2), NULL, CAST(N'2019-03-24 09:29:41.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (12, 9, N'ewwerwerr', N'video', N'content/uploads/slide/video/91553403813455189472.mp4', N'eeww', N'12', 12, 0, CAST(N'2019-03-24 10:33:33.0000000' AS DateTime2), NULL, CAST(N'2019-03-24 10:33:33.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (13, 8, N'video slide', N'video', N'content/uploads/slide/video/815534044741466521774.mp4', N'video slide description', N'10', 11, 2, CAST(N'2019-03-24 10:44:34.0000000' AS DateTime2), NULL, CAST(N'2019-03-24 10:44:34.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (14, 8, N'testing neew1112', N'image', N'content/uploads/slide/image/81553458964286937654.jpg', N'testing', N'20', 2, 1, CAST(N'2019-03-25 01:52:44.0000000' AS DateTime2), NULL, CAST(N'2019-03-25 01:52:44.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (15, 20, N'malayalam slide', N'image', N'content/uploads/slide/image/2015535914861082000950.jpg', N'testing slide', N'10', 2, 0, CAST(N'2019-03-26 14:41:26.0000000' AS DateTime2), NULL, CAST(N'2019-03-26 14:41:26.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (16, 22, N'test slide 1', N'video', N'content/uploads/slide/video/221553966583166215591.mp4', N'test description', N'10', 2, 1, CAST(N'2019-03-30 22:53:03.0000000' AS DateTime2), NULL, CAST(N'2019-03-30 22:53:03.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (17, 15, N'Sample Slide', N'image', N'content/uploads/slide/image/1515578690301727939631.jpg', N'', N'10', 2, 1, CAST(N'2019-05-15 02:53:50.0000000' AS DateTime2), NULL, CAST(N'2019-05-15 02:53:50.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (18, 24, N'Sample Slide 123', N'image', N'content/uploads/slide/image/2415582947231063160563.jpg', N'', N'10', 1, 2, CAST(N'2019-05-20 01:08:43.0000000' AS DateTime2), NULL, CAST(N'2019-05-20 01:15:12.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (19, 25, N'Sample Slide', N'image', N'content/uploads/slide/image/251559021277867586945.jpg', N'<p>Slide description</p>
', N'10', 1, 1, CAST(N'2019-05-28 10:57:57.0000000' AS DateTime2), NULL, CAST(N'2019-05-28 10:57:57.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (20, 2, N'Last slide', N'video', N'content/uploads/slide/video/21559024701964241193.mp4', N'<p>Testing description</p>
', N'15', 3, 2, CAST(N'2019-05-28 11:55:01.0000000' AS DateTime2), NULL, CAST(N'2019-05-28 12:37:10.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (21, 26, N'قوانيـــن الســــير', N'image', N'content/uploads/slide/image/2615599898681635405812.jpg', N'<ol>
 <li><span dir="rtl">قوانيـــن الســــير</span></li>
</ol>
', N'10', 1, 1, CAST(N'2019-06-08 16:01:08.0000000' AS DateTime2), NULL, CAST(N'2019-06-08 16:07:31.0000000' AS DateTime2), 0)
SET IDENTITY_INSERT [dbo].[ad_slides] OFF
SET IDENTITY_INSERT [dbo].[ad_staff] ON 

INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (1, N'Admin', N'admin@educationapp.com', N'$2y$10$uqfwk0rM.IDQwA.Kwwv0JOfH1VVRKWgqe6ojJq0Q0QnE7iThih8Y6', N'9876543210', 0, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2018-11-28 11:19:53.0000000' AS DateTime2))
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (2, N'Faculty', N'faculty@educationapp.com', N'$2y$10$uqfwk0rM.IDQwA.Kwwv0JOfH1VVRKWgqe6ojJq0Q0QnE7iThih8Y6', N'784596310', 1, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2018-12-20 10:24:41.0000000' AS DateTime2))
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (4, N'Jino Mukesh', N'jino@test.com', N'$2y$10$6IntcRCdOy/n6azc9r8uSuIp3cBw/ggnQrMR.RXNzg6UkOk6OGnya', N'7845129630', 0, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2019-01-02 10:21:24.0000000' AS DateTime2))
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (7, N'Mukesh MB', N'mukesh@test.com', N'$2y$10$WWXTFhDTsR7fEuDA4UjJU.mKVrGbSZW4kpEPCXvrCIS9qxcuH4En.', N'875421854112', 0, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2019-01-02 10:31:37.0000000' AS DateTime2))
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (9, N'Sobin', N'sobin@educationapp.com', N'$2y$10$7Os/MWY8bv4PHoHdti0vuupn7lMiiV4infiOeBvczlfVsIFxptNDq', N'7845129630', 1, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2019-01-05 10:32:08.0000000' AS DateTime2))
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (10, N'Soumya JH', N'soumya@gmail.com', N'$2y$10$LqOaT4pGSp0romnv8SVWIeFftFzgNCwcIVKCV.xfM3kHRxjz77nEC', N'9876543210', 0, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2019-01-18 12:26:09.0000000' AS DateTime2))
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (25, N'testing admin', N'admin@matrimonial.com', N'$2y$10$gfVXn6IG.tmvDgk5SPcvse0sSG/6CeGJ4CXrgaVCicBAr7zaCRRnO', N'8787878787', 0, 0, N'0', CAST(N'2019-10-01 16:11:07.0000000' AS DateTime2), CAST(N'2019-10-01 16:11:07.0000000' AS DateTime2))
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (26, N'Sobin12', N'admin@admin.com', N'$2y$10$JmHkksNolCypmNM8JeOcYOSjEMcJxmTcEJWwF/.6gx9qZczyTverK', N'7845129630', 0, 0, N'0', CAST(N'2019-10-01 18:23:06.0000000' AS DateTime2), CAST(N'2019-10-01 18:23:06.0000000' AS DateTime2))
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (28, N'Trainer', N'trainer@trainer.com', N'$2y$10$o.p.s9F4ydZLPfVN5DAnZOgbNjcK7kCzmp.d47vtwHhbKZHpqTDpy', N'7845129630', 1, 0, N'0', CAST(N'2019-10-01 18:34:13.0000000' AS DateTime2), CAST(N'2019-10-01 18:34:13.0000000' AS DateTime2))
SET IDENTITY_INSERT [dbo].[ad_staff] OFF
SET IDENTITY_INSERT [dbo].[ad_student] ON 

INSERT [dbo].[ad_student] ([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time]) VALUES (1, N'Student', N'222', N'222', N'222', N'258-9586-986542', N'student@educationapp.com', N'$2y$10$crI.A8IFva9YbHYbvnY.L.Mq.8z/G9tuPW1GVrRGkS2M7aaiC8PXe', N'784521058', 0, 0, 0, 0, N'', CAST(N'2019-05-11 23:05:06.0000000' AS DateTime2), CAST(N'2018-12-20 11:14:26.0000000' AS DateTime2))
INSERT [dbo].[ad_student] ([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time]) VALUES (2, N'Ram Thilak', N'', N'', N'', N'', N'ramthilak@gmail.com', N'$2y$10$V7/99nNsFkQtgzYE4OO5eOPDT5Ap4FwfeqL3fiPIzKiWIhQ8DH2Da', N'8526391', 0, 0, 0, 0, N'', CAST(N'2019-05-11 23:05:06.0000000' AS DateTime2), CAST(N'2019-01-05 10:45:09.0000000' AS DateTime2))
INSERT [dbo].[ad_student] ([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time]) VALUES (3, N'Aishwariya', N'', N'', N'', N'', N'aishwariya@gmail.com', N'$2y$10$06wqMdz.5BXEuu9EU0kow.XncC9JkS9in0e1ADg2iwfPjbjnhfMn2', N'741852096', 0, 0, 0, 0, N'', CAST(N'2019-05-11 23:05:06.0000000' AS DateTime2), CAST(N'2019-01-05 10:46:55.0000000' AS DateTime2))
INSERT [dbo].[ad_student] ([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time]) VALUES (4, N'Shaemin', N'859-6895-256895', N'', N'', N'258-9586-986542', N'shaemin@educationapp.com', N'$2y$10$8IoYiPBRc2ICQSonqxIxs./xsk84.SbiGVgNFqieu4Aenk73FBaHG', N'7896543210', 0, 0, 0, 0, N'', CAST(N'2019-05-11 23:05:06.0000000' AS DateTime2), CAST(N'2019-03-06 12:05:58.0000000' AS DateTime2))
INSERT [dbo].[ad_student] ([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time]) VALUES (6, N'SAID WALI KHAN GUL DARAZ KHAN', N'1111', N'111', N'111', NULL, N'student@domain.com', N'', N'0', 0, 0, 0, 0, N'', CAST(N'2019-05-15 00:37:52.0000000' AS DateTime2), CAST(N'2019-05-15 00:37:52.0000000' AS DateTime2))
INSERT [dbo].[ad_student] ([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time]) VALUES (7, N'MAI JASSIM MOHAMED ALI AL HAMMADI', N'112', N'112', N'112', NULL, N'student@domain.com', N'', N'0', 0, 2, 1, 0, N'', CAST(N'2019-05-15 01:31:16.0000000' AS DateTime2), CAST(N'2019-05-15 01:31:16.0000000' AS DateTime2))
INSERT [dbo].[ad_student] ([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time]) VALUES (15, N'FATEMA YOSEF HASAN MOHAMAD ALHAMMADI', N'123', N'123', N'123', NULL, N'student@domain.com', N'', N'0', 0, 2, 1, 0, N'', CAST(N'2019-05-19 11:36:51.0000000' AS DateTime2), CAST(N'2019-05-19 11:36:51.0000000' AS DateTime2))
INSERT [dbo].[ad_student] ([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time]) VALUES (16, N'Test Name', N'111', N'111', N'111', NULL, N'student@domain.com', N'', N'0', 0, 2, 1, 0, N'', CAST(N'2019-06-14 13:49:28.0000000' AS DateTime2), CAST(N'2019-06-14 13:49:28.0000000' AS DateTime2))
INSERT [dbo].[ad_student] ([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time]) VALUES (20, N'SAFIYEH MOHAMMAD DARYANA VARD', N'125', N'125', N'125', NULL, N'student@domain.com', N'password123', N'0', 0, 2, 1, 0, NULL, CAST(N'2019-09-30 13:17:40.0000000' AS DateTime2), CAST(N'2019-09-30 13:17:40.0000000' AS DateTime2))
SET IDENTITY_INSERT [dbo].[ad_student] OFF
SET IDENTITY_INSERT [dbo].[notifications] ON 

INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (112, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-20 00:20:50.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (113, 1, N'Admin', N'Admin', N'', 0, N'', N'Admin Comment', N'http://localhost/eduapp/admin/lesson/summary/bFZHcDF0alhzWTYvZGtYZTc1ZyswUT09', CAST(N'2019-05-20 00:24:42.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (114, 0, N'Faculty', N'Trainer', N'', 0, N'', N'Login', N'', CAST(N'2019-05-20 00:31:53.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (115, 2, N'Faculty', N'Trainer', N'', 0, N'', N'Comment Updated', N'http://localhost/eduapp/admin/lesson/summary/bFZHcDF0alhzWTYvZGtYZTc1ZyswUT09', CAST(N'2019-05-20 00:43:49.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (116, 2, N'Faculty', N'Trainer', N'', 0, N'', N'Quiz Updated', N'http://localhost/eduapp/admin/quiz/preview_quiz/c3N3SzNuTXhITDNvRjlQb2RKU0s0UT09', CAST(N'2019-05-20 00:53:23.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (117, 2, N'Faculty', N'Trainer', N'', 0, N'Sample Slide 123', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/TFd1VmxhYUVIbGhjMkprSEtBQkVOQT09', CAST(N'2019-05-20 01:15:12.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (118, 0, N'Faculty', N'Trainer', N'', 0, N'', N'Login', N'', CAST(N'2019-05-20 10:51:09.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (119, 2, N'Faculty', N'Trainer', N'', 0, N'', N'Comment Updated', N'http://localhost/eduapp/admin/lesson/summary/WEEvaENpL3VyK3BxTER3cTFYYVJqUT09', CAST(N'2019-05-20 11:02:45.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (120, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-20 21:59:07.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (121, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-27 10:13:31.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (122, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-27 22:52:41.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (123, 1, N'Admin', N'Admin', N'', 0, N'School Bus Driver', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-27 22:53:03.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (124, 1, N'Admin', N'Admin', N'', 0, N'School Bus Driver', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-27 23:41:20.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (125, 1, N'Admin', N'Admin', N'', 0, N'School Bus Driver', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-27 23:42:38.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (126, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-28 10:28:52.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (127, 1, N'Admin', N'Admin', N'', 0, N'School Bus Driver', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-28 10:29:06.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (128, 1, N'Admin', N'Admin', N'', 0, N'School Bus Driver', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-28 10:39:07.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (129, 1, N'Admin', N'Admin', N'', 0, N'No License', N'Course Published', N'', CAST(N'2019-05-28 10:44:41.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (130, 1, N'Admin', N'Admin', N'', 0, N'No License', N'Course Published', N'', CAST(N'2019-05-28 10:50:44.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (131, 1, N'Admin', N'Admin', N'', 0, N'Sample Slide', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-28 10:57:57.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (132, 0, N'Faculty', N'Trainer', N'', 0, N'', N'Login', N'', CAST(N'2019-05-28 11:43:52.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (133, 5, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-05-28 11:47:18.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (134, 2, N'Faculty', N'Trainer', N'', 0, N'Last slide', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-28 11:55:01.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (135, 2, N'Faculty', N'Trainer', N'', 0, N'Last slide', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/bHNHLytmNjNHYjU2aUJPTlJDNzhyQT09', CAST(N'2019-05-28 11:56:23.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (136, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-30 20:33:06.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (137, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-08 15:35:44.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (138, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-08 15:58:55.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (139, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-06-08 16:01:08.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (140, 1, N'Admin', N'Admin', N'', 0, N'Left hand driving', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-06-08 16:04:17.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (141, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-08 16:07:31.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (142, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-10 19:46:00.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (143, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-11 15:22:14.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (144, 1, N'Admin', N'Admin', N'', 0, N'Left hand driving', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-06-11 15:47:05.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (145, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-11 16:34:17.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (146, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-11 16:34:44.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (147, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-11 16:35:06.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (148, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-11 16:35:57.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (149, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-11 16:36:03.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (150, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-14 13:39:40.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (151, 1, N'Admin', N'Admin', N'', 0, N'Motor Cycle', N'Course Published', N'', CAST(N'2019-06-14 13:41:25.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (152, 16, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-06-14 13:49:28.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (153, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-14 14:01:10.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (154, 1, N'Admin', N'Admin', N'', 0, N'Motor Cycle', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-06-14 15:58:51.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (155, 16, N'Test Name', N'Student', N'', 0, N'Left hand driving', N'Completed', N'', CAST(N'2019-06-14 16:03:20.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (156, 16, N'Test Name', N'Student', N'', 0, N'Left hand driving', N'Completed', N'', CAST(N'2019-06-14 16:03:23.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (157, 16, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-06-14 16:26:02.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (158, 16, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-06-17 17:46:59.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (159, 16, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-06-19 05:58:11.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (160, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-07-26 21:26:48.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (161, 16, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-08-02 23:07:15.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (162, 16, N'Test Name', N'Student', N'', 0, N'Left hand driving', N'Completed', N'', CAST(N'2019-08-02 23:08:15.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (163, 16, N'Test Name', N'Student', N'', 0, N'Left hand driving', N'Completed', N'', CAST(N'2019-08-02 23:08:20.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (164, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-09-11 18:09:54.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (172, 16, N'Test Name', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-09-30 12:33:11.350' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (173, 16, N'Test Name', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-09-30 12:34:42.387' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (174, 20, N'SAFIYEH MOHAMMAD DARYANA VARD', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-09-30 13:24:06.113' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (175, 20, N'SAFIYEH MOHAMMAD DARYANA VARD', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-09-30 13:24:27.000' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (176, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-01 14:22:04.633' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (177, 20, N'SAFIYEH MOHAMMAD DARYANA VARD', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-01 22:10:19.450' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (178, 0, N'Faculty', N'Trainer', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-01 22:26:28.077' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (179, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-10 21:16:06.220' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (180, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-10 21:26:39.623' AS DateTime))
SET IDENTITY_INSERT [dbo].[notifications] OFF
ALTER TABLE [dbo].[ad_assignments] ADD  DEFAULT ((0)) FOR [status]
GO
ALTER TABLE [dbo].[ad_assignments] ADD  DEFAULT (getdate()) FOR [created_on]
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
