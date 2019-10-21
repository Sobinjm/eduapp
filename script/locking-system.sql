USE [educationapp]
GO
/****** Object:  Table [dbo].[ad_assignments]    Script Date: 21-10-2019 10:19:34 AM ******/
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
/****** Object:  Table [dbo].[ad_course]    Script Date: 21-10-2019 10:19:34 AM ******/
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
/****** Object:  Table [dbo].[ad_lessons]    Script Date: 21-10-2019 10:19:34 AM ******/
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
	[lesson_version] [int] NULL CONSTRAINT [DF_ad_lessons_lesson_version]  DEFAULT ((1)),
	[lesson_lock] [bigint] NULL,
 CONSTRAINT [PK_ad_lessons_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[ad_quiz]    Script Date: 21-10-2019 10:19:34 AM ******/
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
/****** Object:  Table [dbo].[ad_slide_comments]    Script Date: 21-10-2019 10:19:34 AM ******/
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
/****** Object:  Table [dbo].[ad_slides]    Script Date: 21-10-2019 10:19:34 AM ******/
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
/****** Object:  Table [dbo].[ad_staff]    Script Date: 21-10-2019 10:19:34 AM ******/
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
/****** Object:  Table [dbo].[ad_student]    Script Date: 21-10-2019 10:19:34 AM ******/
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
/****** Object:  Table [dbo].[employee_list]    Script Date: 21-10-2019 10:19:34 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[employee_list](
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
/****** Object:  Table [dbo].[notifications]    Script Date: 21-10-2019 10:19:34 AM ******/
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
/****** Object:  Table [dbo].[student_list]    Script Date: 21-10-2019 10:19:34 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[student_list](
	[id] [int] IDENTITY(14,1) NOT NULL,
	[StudentNo] [int] NOT NULL,
	[TrafficNo] [int] NOT NULL,
	[TryFileNo] [int] NOT NULL,
	[NameEng] [nvarchar](150) NOT NULL,
	[eNameAr] [nvarchar](150) NOT NULL,
	[BranchNo] [int] NOT NULL,
 CONSTRAINT [PK_student_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[student_table]    Script Date: 21-10-2019 10:19:34 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[student_table](
	[id] [int] IDENTITY(14,1) NOT NULL,
	[StudentNo] [int] NOT NULL,
	[TrafficNo] [nvarchar](150) NOT NULL,
	[TryFileNo] [nvarchar](150) NOT NULL,
	[NameEng] [nvarchar](150) NOT NULL,
	[NameAr] [nvarchar](150) NOT NULL,
	[BranchNo] [int] NOT NULL,
	[EmiratesID] [int] NULL,
 CONSTRAINT [PK_student_table] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Table_Lesson]    Script Date: 21-10-2019 10:19:34 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Table_Lesson](
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

INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (2, N'IN', N'Introduction', 1, N'content/uploads/lessons/154833124221808.jpg', N'9', N'7', N'english', 2, CAST(N'2019-01-24 11:49:51.0000000' AS DateTime2), CAST(N'2019-06-14 14:19:57.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (3, N'CO', N'Course Overview', 2, N'content/uploads/lessons/154832285614613.jpg', N'9', N'7', N'english', 2, CAST(N'2019-01-24 15:10:56.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:01.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (4, N'LHDAI', N'Left Hand Driving - An Introduction', 3, N'content/uploads/lessons/15483229653431.jpg', N'9', N'7', N'english', 2, CAST(N'2019-01-24 15:12:45.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:06.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (5, N'', N'ഇടതു കൈ കൊണ്ടുപോകൽ - ഒരു ആമുഖം', 3, N'content/uploads/lessons/15483247133005.jpg', N'9', N'7', N'malayalam', 2, CAST(N'2019-01-24 15:41:53.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:11.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (6, N'', N'കോഴ്സ് അവലോകനം', 2, N'content/uploads/lessons/15483247632858.jpg', N'9', N'7', N'malayalam', 2, CAST(N'2019-01-24 15:42:43.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:15.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (7, N'', N'ആമുഖം', 1, N'content/uploads/lessons/15483247944772.jpg', N'9', N'7', N'malayalam', 2, CAST(N'2019-01-24 15:43:14.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:19.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (8, N'', N'Lession 1 testing2', 1, N'content/uploads/lessons/15527177701572905319.gif', N'10', N'', N'english', 0, CAST(N'2019-03-16 11:59:30.0000000' AS DateTime2), NULL, 0, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (9, N'', N'Lesson 4', 4, N'content/uploads/lessons/15528994871551210041.gif', N'11', N'', N'english', 0, CAST(N'2019-03-18 14:28:07.0000000' AS DateTime2), NULL, 2, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (15, N'llp', N'sdfhdsifsfsdfds', 1, N'content/uploads/lessons/1553462489532932530.jpg', N'2', N'RHDL', N'english', 0, CAST(N'2019-03-25 02:51:29.0000000' AS DateTime2), CAST(N'2019-05-15 08:29:14.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (16, N'llp2', N'fsdfsdfsdfds', 2, N'content/uploads/lessons/15534626841914808894.jpg', N'2', N'RHDL', N'english', 0, CAST(N'2019-03-25 02:54:44.0000000' AS DateTime2), CAST(N'2019-05-15 08:29:21.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (17, N'', N'new tresting lesson', 4, N'content/uploads/lessons/1553579509633819815.jpg', N'10', N'', N'english', 0, CAST(N'2019-03-26 11:21:49.0000000' AS DateTime2), NULL, 0, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (20, N'', N'Malayalam lesson1', 1, N'content/uploads/lessons/15535889241978715674.jpg', N'10', N'', N'malayalam', 0, CAST(N'2019-03-26 13:58:44.0000000' AS DateTime2), NULL, 0, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (21, N'', N'testing lesson', 4, N'content/uploads/lessons/155393188969245475.jpg', N'7', N'', N'english', 0, CAST(N'2019-03-30 13:14:49.0000000' AS DateTime2), NULL, 2, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (22, N'', N'lesson 2', 3, N'content/uploads/lessons/15539665431233388004.jpg', N'7', N'', N'english', 0, CAST(N'2019-03-30 22:52:23.0000000' AS DateTime2), NULL, 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (24, N'4PD', N'4X4 Practical Discount', 2, N'content/uploads/lessons/15578636521289686309.jpg', N'17', N'', N'english', 0, CAST(N'2019-05-15 01:24:12.0000000' AS DateTime2), CAST(N'2019-05-19 15:32:58.0000000' AS DateTime2), 2, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (25, N'L17', N'Lesson 17', 5, N'content/uploads/lessons/1559020890831900105.jpg', N'19', N'', N'english', 0, CAST(N'2019-05-28 10:51:30.0000000' AS DateTime2), CAST(N'2019-05-28 10:51:30.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (26, N'4DW', N'4X4 Prctcl Wknd Discount', 1, N'content/uploads/lessons/15599897582036297500.jpg', N'19', N'', N'arabic', 0, CAST(N'2019-06-08 15:59:18.0000000' AS DateTime2), CAST(N'2019-06-08 15:59:18.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (27, N'4DW', N'4X4 Prctcl Wknd Discount', 1, N'content/uploads/lessons/1560501103221219511.png', N'20', N'', N'english', 0, CAST(N'2019-06-14 14:01:43.0000000' AS DateTime2), CAST(N'2019-06-14 14:01:43.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (28, N'4PD', N'4X4 Practical Discount', 2, N'content/uploads/lessons/15605020141588887788.png', N'20', N'1', N'english', 1, CAST(N'2019-06-14 14:16:54.0000000' AS DateTime2), CAST(N'2019-06-14 14:16:54.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (30, N'L1', N'Lesson 1', 2, N'content/uploads/lessons/15710571331317591659.jpg', N'0', N'0', N'english', 0, CAST(N'2019-10-14 18:15:33.0000000' AS DateTime2), CAST(N'2019-10-14 18:15:33.0000000' AS DateTime2), 1, 1, 1, NULL)
INSERT [dbo].[ad_lessons] ([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock]) VALUES (35, N'IN', N'Introduction', 1, N'content/uploads/lessons/154833124221808.jpg', N'1', N'1', N'english', 0, CAST(N'2019-10-18 12:05:10.0000000' AS DateTime2), CAST(N'2019-10-18 12:05:10.0000000' AS DateTime2), 1, 1, 2, 2)
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
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (13, 7, N'true_or_false', N'erydyr', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:46:35.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (14, 10, N'true_or_false', N'helloooo', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:48:32.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (15, 10, N'true_or_false', N'ggggggggggggggggg', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:49:12.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (16, 10, N'true_or_false', N'hello', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:56:20.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (17, 8, N'true_or_false', N'testing quiz english', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-26 22:10:33.0000000' AS DateTime2), 0, NULL, 0, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (18, 21, N'true_or_false', N'testing quiz lesson1', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-30 22:55:02.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (19, 22, N'true_or_false', N'dsfsfsfsf', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-30 23:02:09.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (20, 3, N'true_or_false', N'yyyyyyyyy', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-04-01 18:27:19.0000000' AS DateTime2), 0, NULL, 0, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (21, 21, N'right_answer', N'ttttttttttttt', NULL, N'video', N'content/uploads/quiz/video/211554128480741660032.mp4', N'{"a":{"question":"q1","answer":"no"},"b":{"question":"q2","answer":"no"},"c":{"question":"q3","answer":"yes"},"d":{"question":"q4","answer":"no"}}', NULL, NULL, CAST(N'2019-04-01 19:51:20.0000000' AS DateTime2), 0, NULL, 0, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (22, 35, N'true_or_false', N'Driving automation helps newbie drivers drive fast?', NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (23, 35, N'true_or_false', N'Driving relaxation course helps learners know the basics of relaxation during driving.', NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (24, 35, N'true_or_false', N'Does piano music relax mind?', NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (25, 35, N'true_or_false', N'You should hold your steering wheel at 90-degree angle?', NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (26, 35, N'right_answer', N'Which car is best for driving?', NULL, N'image', N'content/uploads/quiz/image/15517003199744.jpg', N'{"a":{"question":"Maruthi Alto","answer":"yes"},"b":{"question":"Suzuki Baleno","answer":"no"},"c":{"question":"Scorpio","answer":"no"},"d":{"question":"Lamborghini","answer":"no"}}', NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (27, 35, N'right_answer', N'What are the main objectives of this course introduction?', NULL, N'image', N'content/uploads/quiz/image/2155176416220691.jpg', N'{"a":{"question":"Course introduction one","answer":"no"},"b":{"question":"Descriptions for testing","answer":"no"},"c":{"question":"Course overview developments","answer":"yes"},"d":{"question":"Steering wheels resolutions","answer":"no"}}', NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz] ([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status]) VALUES (28, 35, N'drag_and_drop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
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
INSERT [dbo].[ad_slide_comments] ([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at]) VALUES (21, 20, N'Slide Comment Last slide', 0, 0, 1, CAST(N'2019-10-16 10:52:05.247' AS DateTime), CAST(N'2019-10-16 10:52:05.247' AS DateTime))
INSERT [dbo].[ad_slide_comments] ([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at]) VALUES (22, 28, N'Testing Comment', 0, 0, 31, CAST(N'2019-10-20 22:47:04.893' AS DateTime), CAST(N'2019-10-20 22:47:04.893' AS DateTime))
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
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (22, 16, N'Testing', N'image', N'content/uploads/slide/image/161570863736280479546.jpg', N'', N'10', 1, 0, CAST(N'2019-10-12 12:32:17.0000000' AS DateTime2), NULL, CAST(N'2019-10-12 12:32:17.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (23, 16, N'Testing', N'image', N'content/uploads/slide/image/161570863807866783751.jpg', N'', N'10', 1, 0, CAST(N'2019-10-12 12:33:28.0000000' AS DateTime2), NULL, CAST(N'2019-10-12 12:33:28.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (24, 28, N'Sample Slide', N'image', N'content/uploads/slide/image/281571054088565429207.png', N'', N'10', 2, 1, CAST(N'2019-10-14 17:24:49.0000000' AS DateTime2), NULL, CAST(N'2019-10-14 17:24:49.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (26, 35, N'Piano - Driving Relaxation', N'audio', N'content/uploads/slide/audio/2155003715622394.mp3', N'Piano - Introduction Piano introduction course.', N'04:00', 4, 1, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (27, 35, N'How to hold your steering wheel', N'image', N'content/uploads/slide/image/2155133492010408.jpg', N'Steering Wheels:

How to hold your steering wheel. This is a sample course.', N'00:00', 5, 1, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides] ([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status]) VALUES (28, 35, N'Last slide', N'video', N'content/uploads/slide/video/21559024701964241193.mp4', N'', N'15', 3, 30, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 0)
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
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (29, N'New Admin', N'newadmin@educationapp.com', N'$2y$10$KMhTu/x4wRDskd7JTywOQeJX3bCnbsZ6GaYasV6nk3ka9UV1S3bKO', N'7894561230', 0, 0, N'0', CAST(N'2019-10-11 19:57:04.0000000' AS DateTime2), CAST(N'2019-10-11 19:57:04.0000000' AS DateTime2))
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (30, N'Higher Management', N'hm@educationapp.com', N'$2y$10$mFjpPKYGQ3./bTxRyejvkeXhqpYuKjXxhMC2mbCX9AWchhVnTeyT.', N'8787878787', 3, 0, N'0', CAST(N'2019-10-20 19:21:51.0000000' AS DateTime2), CAST(N'2019-10-20 19:21:51.0000000' AS DateTime2))
INSERT [dbo].[ad_staff] ([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time]) VALUES (31, N'Quality', N'quality@educationapp.com', N'$2y$10$gI8TlRDp29eg28HGk0gq/OGaKaxcedWCsrIRpT3fBaMRVPyyfoS4C', N'8787878787', 2, 0, N'0', CAST(N'2019-10-20 22:28:33.0000000' AS DateTime2), CAST(N'2019-10-20 22:28:33.0000000' AS DateTime2))
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
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (181, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-11 19:56:26.613' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (182, 0, N'New Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-11 19:57:27.977' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (185, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-12 20:16:51.953' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (186, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-13 19:23:59.703' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (187, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-14 17:00:47.080' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (188, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-14 17:14:06.750' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (189, 1, N'Admin', N'Admin', NULL, 0, N'Sample Slide', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-10-14 17:24:48.680' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (190, 1, N'Admin', N'Admin', NULL, 0, N'Sample Slide', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-10-14 18:16:03.860' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (191, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-14 23:51:15.933' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (192, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-15 11:01:48.297' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (193, 0, N'Faculty', N'Trainer', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-15 11:02:21.177' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (194, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-15 23:20:55.083' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (195, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-15 23:25:43.487' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (196, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-15 23:35:24.727' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (197, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-16 10:32:25.210' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (198, 1, N'Admin', N'Admin', NULL, 0, NULL, N'Admin Comment', N'http://localhost/eduapp/admin/lesson/summary/bHNHLytmNjNHYjU2aUJPTlJDNzhyQT09', CAST(N'2019-10-16 10:52:05.287' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (199, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-17 10:22:12.763' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (200, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-18 11:55:00.890' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (202, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-18 23:40:00.457' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (203, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-19 11:07:55.377' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (204, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-20 19:21:22.930' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (205, 0, N'Higher Management', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-20 19:22:09.750' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (206, 30, N'Higher Management', N'Trainer', NULL, 0, N'Last slide', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/a0ZiR3BnNDRXWHNoUWtreXF2L3R0Zz09', CAST(N'2019-10-20 20:56:45.133' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (207, 30, N'Higher Management', N'Trainer', NULL, 0, N'Last slide', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/a0ZiR3BnNDRXWHNoUWtreXF2L3R0Zz09', CAST(N'2019-10-20 20:56:50.027' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (208, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-20 22:28:01.340' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (209, 0, N'Quality', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-20 22:28:55.323' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (210, 31, N'Quality', N'Trainer', NULL, 0, NULL, N'Admin Comment', N'http://localhost/eduapp/admin/lesson/summary/a0ZiR3BnNDRXWHNoUWtreXF2L3R0Zz09', CAST(N'2019-10-20 22:47:04.903' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (211, 0, N'Faculty', N'Trainer', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-20 22:51:11.760' AS DateTime))
INSERT [dbo].[notifications] ([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at]) VALUES (212, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-21 00:50:52.230' AS DateTime))
SET IDENTITY_INSERT [dbo].[notifications] OFF
SET IDENTITY_INSERT [dbo].[student_list] ON 

INSERT [dbo].[student_list] ([id], [StudentNo], [TrafficNo], [TryFileNo], [NameEng], [eNameAr], [BranchNo]) VALUES (14, 111, 111, 111, N'abc', N'و', 111)
SET IDENTITY_INSERT [dbo].[student_list] OFF
SET IDENTITY_INSERT [dbo].[student_table] ON 

INSERT [dbo].[student_table] ([id], [StudentNo], [TrafficNo], [TryFileNo], [NameEng], [NameAr], [BranchNo], [EmiratesID]) VALUES (14, 111, N'111', N'111', N'111', N'111', 111, 111)
SET IDENTITY_INSERT [dbo].[student_table] OFF
SET IDENTITY_INSERT [dbo].[Table_Lesson] ON 

INSERT [dbo].[Table_Lesson] ([id], [Code], [Description]) VALUES (1, N'L1', N'Lesson 1')
INSERT [dbo].[Table_Lesson] ([id], [Code], [Description]) VALUES (2, N'L2', N'Lesson 2')
INSERT [dbo].[Table_Lesson] ([id], [Code], [Description]) VALUES (3, N'L3', N'Lesson 3')
INSERT [dbo].[Table_Lesson] ([id], [Code], [Description]) VALUES (4, N'L4', N'Lesson 4')
INSERT [dbo].[Table_Lesson] ([id], [Code], [Description]) VALUES (5, N'L5', N'Lesson 5')
INSERT [dbo].[Table_Lesson] ([id], [Code], [Description]) VALUES (6, N'L6', N'Lesson 6')
INSERT [dbo].[Table_Lesson] ([id], [Code], [Description]) VALUES (7, N'L7', N'Lesson 7')
INSERT [dbo].[Table_Lesson] ([id], [Code], [Description]) VALUES (8, N'L8', N'Lesson 8')
INSERT [dbo].[Table_Lesson] ([id], [Code], [Description]) VALUES (9, N'L9', N'Lesson 9')
INSERT [dbo].[Table_Lesson] ([id], [Code], [Description]) VALUES (10, N'L10', N'Lesson 10')
SET IDENTITY_INSERT [dbo].[Table_Lesson] OFF
ALTER TABLE [dbo].[ad_assignments] ADD  DEFAULT ((0)) FOR [status]
GO
ALTER TABLE [dbo].[ad_assignments] ADD  DEFAULT (getdate()) FOR [created_on]
GO
/****** Object:  StoredProcedure [dbo].[_sp_el_employees]    Script Date: 21-10-2019 10:19:35 AM ******/
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
	SELECT Emp_no, UserName, Name from employee_list;
END

GO
/****** Object:  StoredProcedure [dbo].[_sp_el_lessons]    Script Date: 21-10-2019 10:19:35 AM ******/
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
	SELECT Code,Description FROM dbo.Table_Lesson
END

GO
/****** Object:  StoredProcedure [dbo].[_sp_el_studentauth]    Script Date: 21-10-2019 10:19:35 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[_sp_el_studentauth] 
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
	SELECT TOP 1000 [id]
      ,[StudentNo]
      ,[TrafficNo]
      ,[TryFileNo]
      ,[NameEng]
      ,[NameAr]
      ,[BranchNo]
      ,[EmiratesID]
  FROM [educationapp].[dbo].[student_table] where StudentNo=@StudentNo AND TrafficNo=@TrafficNo AND TryFileNo=@fileNo AND BranchNo=@BranchNo ;
	--SELECT [StudentNo],[NameEng],[NameAr],[EmiratesID],[TrafficNo],[TryFileNo] from student_list where StudentNo=@StudentNo AND TrafficNo=@TrafficNo AND TryFileNo=@fileNo AND BranchNo=@BranchNo ;
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
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.student_list' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'student_list'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'educationapp.student_table' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'student_table'
GO
