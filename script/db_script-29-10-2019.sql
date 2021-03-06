USE [educationapp]
GO
/****** Object:  Table [dbo].[ad_assignments]    Script Date: 29-10-2019 10:03:16 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ad_assignments]
(
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[student_id] [int] NOT NULL,
	[course] [int] NULL,
	[course_code] [varchar](50) NULL,
	[status] [int] NULL,
	[dated] [date] NULL,
	[start_date] [nvarchar](50) NULL,
	[end_date] [nvarchar](50) NULL,
	[assigned_by] [bigint] NULL,
	[created_on] [datetime] NULL CONSTRAINT [DF_ad_assignments1_created_on]  DEFAULT (getdate()),
	[slide_count] [nvarchar](50) NULL,
	[lesson_count] [int] NULL,
	[completed_lessons] [varchar](50) NULL,
	[score] [nvarchar](50) NULL,
	[language] [nvarchar](50) NULL,
	[branch] [int] NULL,
	[payment_end_date] [date] NULL,
	[licence_type] [nvarchar](50) NULL,
	[lesson_per_day] [int] NULL,
	[total_lessons] [text] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ad_course]    Script Date: 29-10-2019 10:03:16 AM ******/
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
/****** Object:  Table [dbo].[ad_lessons]    Script Date: 29-10-2019 10:03:16 AM ******/
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
	[created_on] [datetime2](0) NOT NULL DEFAULT (getdate()),
	[updated_on] [datetime2](0) NULL DEFAULT (getdate()),
	[updated_by] [int] NOT NULL,
	[created_by] [bigint] NOT NULL DEFAULT ((1)),
	[lesson_version] [int] NULL CONSTRAINT [DF_ad_lessons_lesson_version]  DEFAULT ((1)),
	[lesson_lock] [bigint] NULL,
	[description] [text] NULL,
	CONSTRAINT [PK_ad_lessons_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[ad_quiz]    Script Date: 29-10-2019 10:03:16 AM ******/
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
/****** Object:  Table [dbo].[ad_slide_comments]    Script Date: 29-10-2019 10:03:16 AM ******/
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
/****** Object:  Table [dbo].[ad_slides]    Script Date: 29-10-2019 10:03:16 AM ******/
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
/****** Object:  Table [dbo].[ad_staff]    Script Date: 29-10-2019 10:03:16 AM ******/
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
/****** Object:  Table [dbo].[ad_student]    Script Date: 29-10-2019 10:03:16 AM ******/
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
/****** Object:  Table [dbo].[employee_list]    Script Date: 29-10-2019 10:03:16 AM ******/
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
/****** Object:  Table [dbo].[notifications]    Script Date: 29-10-2019 10:03:16 AM ******/
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
/****** Object:  Table [dbo].[student_list]    Script Date: 29-10-2019 10:03:16 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[student_list]
(
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
/****** Object:  Table [dbo].[student_table]    Script Date: 29-10-2019 10:03:16 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[student_table]
(
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
/****** Object:  Table [dbo].[studentcoursedetails]    Script Date: 29-10-2019 10:03:16 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[studentcoursedetails]
(
	[id] [int] IDENTITY(1,1) NOT NULL,
	[CourseRef] [nvarchar](50) NOT NULL,
	[LessonCode] [nvarchar](50) NULL,
	[LessonDescription] [text] NULL,
	[BookedDate] [date] NULL,
	[Attendance] [nvarchar](50) NULL,
	[ByPass] [nvarchar](50) NULL,
	[Order] [int] NULL,
	[StudentNo] [int] NULL,
	[TrafficfileNo] [nvarchar](18) NULL,
	[TryfileNo] [nvarchar](18) NULL,
	[BranchNo] [int] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[studentcourses]    Script Date: 29-10-2019 10:03:16 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[studentcourses]
(
	[id] [int] IDENTITY(1,1) NOT NULL,
	[CourseRef] [int] NOT NULL,
	[TryFileNo] [nchar](18) NOT NULL,
	[TrainingExpiry] [date] NULL,
	[PaymentExpiry] [date] NULL,
	[Branch] [int] NULL,
	[EducationLanguage] [nchar](10) NULL,
	[LicenseType] [nchar](18) NULL,
	[NoOfLessonsPerDay] [int] NULL,
	[ExamBookingDate] [date] NULL,
	[StudentNo] [int] NULL,
	[TrafficfileNo] [nvarchar](18) NULL,
	[BranchNo] [int] NULL,
	[ExamStatus] [nvarchar](50) NULL
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Table_Lesson]    Script Date: 29-10-2019 10:03:16 AM ******/
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
SET IDENTITY_INSERT [dbo].[ad_assignments] ON

INSERT [dbo].[ad_assignments]
	([id], [student_id], [course], [course_code], [status], [dated], [start_date], [end_date], [assigned_by], [created_on], [slide_count], [lesson_count], [completed_lessons], [score], [language], [branch], [payment_end_date], [licence_type], [lesson_per_day], [total_lessons])
VALUES
	(27, 111, 1, N'2670513', 1, CAST(N'2019-07-01' AS Date), N'2019-07-20', N'2019-07-20', 1, CAST(N'2019-10-28 21:30:29.820' AS DateTime), N'0', NULL, N'0', N'0', N'AR        ', 1, CAST(N'2020-01-20' AS Date), N'Light vehicle     ', 2, N'[{"LessonCode":"L2","CourseRef":"2670513","LessonName":"Lesson 2","language":"English","LessonDescription":"Lesson 2 Description","ByPass":"No","Order":4,"slide_count":0,"icon":"content\/uploads\/lessons\/15716522221096422096.jpg","current_slide":1,"completed_status":0},{"LessonCode":"L1","CourseRef":"2670513","LessonName":"Lesson 1","language":"English","LessonDescription":"Attitude of Driving","ByPass":"No","Order":5,"slide_count":3,"icon":"content\/uploads\/lessons\/154833124221808.jpg","current_slide":1,"completed_status":0}]')
INSERT [dbo].[ad_assignments]
	([id], [student_id], [course], [course_code], [status], [dated], [start_date], [end_date], [assigned_by], [created_on], [slide_count], [lesson_count], [completed_lessons], [score], [language], [branch], [payment_end_date], [licence_type], [lesson_per_day], [total_lessons])
VALUES
	(28, 111, 1, N'2670514', 0, CAST(N'2019-08-01' AS Date), N'2019-08-20', N'2019-08-20', 1, CAST(N'2019-10-28 21:30:29.827' AS DateTime), N'2=>1', NULL, N'0', N'0', N'AR        ', 1, CAST(N'2020-02-20' AS Date), N'Light Vehicle     ', 2, N'[{"LessonCode":"L1","CourseRef":"2670514","LessonName":"Lesson 1","language":"English","LessonDescription":"Attitude of Driving","ByPass":"No","Order":1,"slide_count":3,"icon":"content\/uploads\/lessons\/154833124221808.jpg","current_slide":1,"completed_status":0},{"LessonCode":"L3","CourseRef":"2670514","LessonName":"Lesson 3","language":"English","LessonDescription":null,"ByPass":"No","Order":2,"slide_count":0,"icon":"content\/uploads\/lessons\/15710571331317591659.jpg","current_slide":1,"completed_status":0},{"LessonCode":"L2","CourseRef":"2670514","LessonName":"Lesson 2","language":"English","LessonDescription":"Lesson 2 Description","ByPass":"No","Order":3,"slide_count":0,"icon":"content\/uploads\/lessons\/15716522221096422096.jpg","current_slide":0,"completed_status":0}]')
SET IDENTITY_INSERT [dbo].[ad_assignments] OFF
SET IDENTITY_INSERT [dbo].[ad_course] ON

INSERT [dbo].[ad_course]
	([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status])
VALUES
	(2, N'RHDL', N'Right hand driving lessons', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/154746301422071.jpg', N'', 18, CAST(N'2019-01-14 16:20:14.0000000' AS DateTime2), CAST(N'2019-01-14 16:20:14.0000000' AS DateTime2), 2, 1, 2)
INSERT [dbo].[ad_course]
	([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status])
VALUES
	(6, N'', N'Security Driver Test - New', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/154752657731949.jpg', N'', 5, CAST(N'2019-01-15 09:59:37.0000000' AS DateTime2), CAST(N'2019-01-14 16:27:17.0000000' AS DateTime2), 2, 1, 2)
INSERT [dbo].[ad_course]
	([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status])
VALUES
	(7, N'', N'Speed Test Lessons', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/154754805221891.jpg', N'', 10, CAST(N'2019-01-15 15:57:32.0000000' AS DateTime2), CAST(N'2019-01-14 16:27:17.0000000' AS DateTime2), 2, 1, 2)
INSERT [dbo].[ad_course]
	([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status])
VALUES
	(9, N'7', N'Left hand driving', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/154781094229202.png', N'<p>Left hand</p>
', 8, CAST(N'2019-01-14 16:27:17.0000000' AS DateTime2), CAST(N'2019-01-14 16:27:17.0000000' AS DateTime2), 2, 1, 0)
INSERT [dbo].[ad_course]
	([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status])
VALUES
	(14, N'', N'sample course', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/15576128092034151146.jpg', N'', 5, CAST(N'2019-05-12 03:43:29.0000000' AS DateTime2), NULL, 1, 1, 2)
INSERT [dbo].[ad_course]
	([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status])
VALUES
	(15, N'', N'10', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/1557862462404281895.jpg', N'', 5, CAST(N'2019-05-15 01:04:22.0000000' AS DateTime2), NULL, 1, 0, 0)
INSERT [dbo].[ad_course]
	([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status])
VALUES
	(16, N'', N'Heavy Vehicle', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/1557862763611838044.jpg', N'', 5, CAST(N'2019-05-15 01:09:23.0000000' AS DateTime2), NULL, 1, 1, 0)
INSERT [dbo].[ad_course]
	([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status])
VALUES
	(17, N'IP0', N'School Bus Driver', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/155786284358927038.jpg', N'<p>testing desc</p>
', 10, CAST(N'2019-05-15 01:10:43.0000000' AS DateTime2), NULL, 1, 1, 0)
INSERT [dbo].[ad_course]
	([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status])
VALUES
	(19, N'8', N'No License', N'{"english":"1","arabic":"1","urdu":"0","pashto":"0","malayalam":"1"}', N'content/uploads/course/1559020844433397255.jpg', N'<p>Demo Description</p>
', 8, CAST(N'2019-05-28 10:50:44.0000000' AS DateTime2), NULL, 1, 1, 0)
INSERT [dbo].[ad_course]
	([id], [course_id], [course_name], [course_lang], [icon_file], [course_desc], [lesson_no], [created_on], [updated_on], [created_by], [updated_by], [publish_status])
VALUES
	(20, N'1', N'Motor Cycle', N'{"english":"1","arabic":"0","urdu":"0","pashto":"0","malayalam":"0"}', N'content/uploads/course/15604998852011980523.png', N'<p>New Comment</p>
', 5, CAST(N'2019-06-14 13:41:25.0000000' AS DateTime2), NULL, 1, 1, 0)
SET IDENTITY_INSERT [dbo].[ad_course] OFF
SET IDENTITY_INSERT [dbo].[ad_lessons] ON

INSERT [dbo].[ad_lessons]
	([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock], [description])
VALUES
	(2, N'L1', N'Introduction', 1, N'content/uploads/lessons/154833124221808.jpg', N'9', N'7', N'english', 2, CAST(N'2019-01-24 11:49:51.0000000' AS DateTime2), CAST(N'2019-06-14 14:19:57.0000000' AS DateTime2), 1, 1, 1, NULL, N'Attitude of Driving')
INSERT [dbo].[ad_lessons]
	([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock], [description])
VALUES
	(3, N'CO', N'Course Overview', 2, N'content/uploads/lessons/154832285614613.jpg', N'9', N'7', N'english', 2, CAST(N'2019-01-24 15:10:56.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:01.0000000' AS DateTime2), 1, 1, 1, NULL, NULL)
INSERT [dbo].[ad_lessons]
	([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock], [description])
VALUES
	(4, N'LHDAI', N'Left Hand Driving - An Introduction', 3, N'content/uploads/lessons/15483229653431.jpg', N'9', N'7', N'english', 2, CAST(N'2019-01-24 15:12:45.0000000' AS DateTime2), CAST(N'2019-06-14 14:20:06.0000000' AS DateTime2), 1, 1, 1, NULL, NULL)
INSERT [dbo].[ad_lessons]
	([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock], [description])
VALUES
	(9, N'', N'Lesson 4', 4, N'content/uploads/lessons/15528994871551210041.gif', N'11', N'', N'english', 0, CAST(N'2019-03-18 14:28:07.0000000' AS DateTime2), NULL, 2, 1, 1, NULL, NULL)
INSERT [dbo].[ad_lessons]
	([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock], [description])
VALUES
	(22, N'', N'lesson 2', 3, N'content/uploads/lessons/15539665431233388004.jpg', N'7', N'', N'english', 0, CAST(N'2019-03-30 22:52:23.0000000' AS DateTime2), NULL, 1, 1, 1, NULL, NULL)
INSERT [dbo].[ad_lessons]
	([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock], [description])
VALUES
	(30, N'L3', N'Lesson 3', 2, N'content/uploads/lessons/15710571331317591659.jpg', N'0', N'0', N'english', 0, CAST(N'2019-10-14 18:15:33.0000000' AS DateTime2), CAST(N'2019-10-14 18:15:33.0000000' AS DateTime2), 1, 1, 1, NULL, NULL)
INSERT [dbo].[ad_lessons]
	([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock], [description])
VALUES
	(35, N'IN', N'Introduction', 1, N'content/uploads/lessons/154833124221808.jpg', N'1', N'1', N'english', 0, CAST(N'2019-10-18 12:05:10.0000000' AS DateTime2), CAST(N'2019-10-18 12:05:10.0000000' AS DateTime2), 1, 1, 2, 2, N'Lesson 3 description')
INSERT [dbo].[ad_lessons]
	([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock], [description])
VALUES
	(36, N'L2', N'Lesson 2', 1, N'content/uploads/lessons/15716522221096422096.jpg', N'0', N'0', N'english', 0, CAST(N'2019-10-21 15:33:42.0000000' AS DateTime2), CAST(N'2019-10-21 15:33:42.0000000' AS DateTime2), 1, 1, 1, NULL, N'Lesson 2 Description')
INSERT [dbo].[ad_lessons]
	([id], [lesson_id], [lesson_name], [lesson_order], [icon_file], [course_id], [course_code], [language], [publish_status], [created_on], [updated_on], [updated_by], [created_by], [lesson_version], [lesson_lock], [description])
VALUES
	(39, N'L5', N'Lesson 5', 0, N'content/uploads/lessons/1572269502155024025.jpg', N'0', N'0', N'english', 0, CAST(N'2019-10-28 19:01:42.0000000' AS DateTime2), CAST(N'2019-10-28 19:01:42.0000000' AS DateTime2), 1, 1, 1, NULL, N'Description')
SET IDENTITY_INSERT [dbo].[ad_lessons] OFF
SET IDENTITY_INSERT [dbo].[ad_quiz] ON

INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(2, 2, N'true_or_false', N'Driving automation helps newbie drivers drive fast?', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(3, 2, N'true_or_false', N'Driving relaxation course helps learners know the basics of relaxation during driving.', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(4, 2, N'true_or_false', N'Does piano music relax mind?', N'false', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(5, 2, N'true_or_false', N'You should hold your steering wheel at 90-degree angle?', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(6, 2, N'right_answer', N'Which car is best for driving?', NULL, N'image', N'content/uploads/quiz/image/15517003199744.jpg', N'{"a":{"question":"Maruthi Alto","answer":"yes"},"b":{"question":"Suzuki Baleno","answer":"no"},"c":{"question":"Scorpio","answer":"no"},"d":{"question":"Lamborghini","answer":"no"}}', NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(7, 2, N'right_answer', N'What are the main objectives of this course introduction?', NULL, N'image', N'content/uploads/quiz/image/2155176416220691.jpg', N'{"a":{"question":"Course introduction one","answer":"no"},"b":{"question":"Descriptions for testing","answer":"no"},"c":{"question":"Course overview developments","answer":"yes"},"d":{"question":"Steering wheels resolutions","answer":"no"}}', NULL, NULL, CAST(N'2019-03-05 00:00:00.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(8, 3, N'drag_and_drop', NULL, NULL, NULL, NULL, NULL, N'{"question_one":{"question":"Four wheeler has :","matching_answer":"4 Wheels"},"question_two":{"question":"Bike has :","matching_answer":"2 Wheels"},"question_three":{"question":"Cycle has:","matching_answer":"2 Wheels run by chain"}}', NULL, CAST(N'2019-03-05 11:34:27.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(9, 8, N'reorder', NULL, NULL, NULL, NULL, NULL, NULL, N'{"1":"Before crossing see left and right","2":"Wait for traffic signal to turn green","3":"Make sure there is no vehicle speeding both sides","4":"Now you can cross the road"}', CAST(N'2019-03-05 12:12:52.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(10, 8, N'true_or_false', N'testing question', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-16 12:05:00.0000000' AS DateTime2), 2, NULL, 2, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(11, 2, N'drag_and_drop', NULL, NULL, NULL, NULL, NULL, N'{"question_one":{"question":"quest 1","matching_answer":"ans 1"},"question_two":{"question":"quest2","matching_answer":"ans2"},"question_three":{"question":"quest 3","matching_answer":"ans3"}}', NULL, CAST(N'2019-03-16 12:17:46.0000000' AS DateTime2), 2, NULL, 2, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(13, 7, N'true_or_false', N'erydyr', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:46:35.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(14, 10, N'true_or_false', N'helloooo', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:48:32.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(15, 10, N'true_or_false', N'ggggggggggggggggg', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:49:12.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(16, 10, N'true_or_false', N'hello', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-25 01:56:20.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(17, 8, N'true_or_false', N'testing quiz english', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-26 22:10:33.0000000' AS DateTime2), 0, NULL, 0, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(18, 21, N'true_or_false', N'testing quiz lesson1', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-30 22:55:02.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(19, 22, N'true_or_false', N'dsfsfsfsf', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-03-30 23:02:09.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(20, 3, N'true_or_false', N'yyyyyyyyy', N'true', NULL, NULL, NULL, NULL, NULL, CAST(N'2019-04-01 18:27:19.0000000' AS DateTime2), 0, NULL, 0, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(21, 21, N'right_answer', N'ttttttttttttt', NULL, N'video', N'content/uploads/quiz/video/211554128480741660032.mp4', N'{"a":{"question":"q1","answer":"no"},"b":{"question":"q2","answer":"no"},"c":{"question":"q3","answer":"yes"},"d":{"question":"q4","answer":"no"}}', NULL, NULL, CAST(N'2019-04-01 19:51:20.0000000' AS DateTime2), 0, NULL, 0, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(22, 35, N'true_or_false', N'Driving automation helps newbie drivers drive fast?', NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(23, 35, N'true_or_false', N'Driving relaxation course helps learners know the basics of relaxation during driving.', NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(24, 35, N'true_or_false', N'Does piano music relax mind?', NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(25, 35, N'true_or_false', N'You should hold your steering wheel at 90-degree angle?', NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(26, 35, N'right_answer', N'Which car is best for driving?', NULL, N'image', N'content/uploads/quiz/image/15517003199744.jpg', N'{"a":{"question":"Maruthi Alto","answer":"yes"},"b":{"question":"Suzuki Baleno","answer":"no"},"c":{"question":"Scorpio","answer":"no"},"d":{"question":"Lamborghini","answer":"no"}}', NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(27, 35, N'right_answer', N'What are the main objectives of this course introduction?', NULL, N'image', N'content/uploads/quiz/image/2155176416220691.jpg', N'{"a":{"question":"Course introduction one","answer":"no"},"b":{"question":"Descriptions for testing","answer":"no"},"c":{"question":"Course overview developments","answer":"yes"},"d":{"question":"Steering wheels resolutions","answer":"no"}}', NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(28, 35, N'drag_and_drop', NULL, NULL, NULL, NULL, NULL, NULL, NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 1, NULL, 1, 0)
INSERT [dbo].[ad_quiz]
	([quiz_id], [lessonid], [quiz_type], [question], [trueorfalse], [mediatype], [upload_media], [right_answer], [drag_drop], [reorder], [created_on], [created_by], [updated_on], [updated_by], [publish_status])
VALUES
	(29, 2, N'reorder', NULL, NULL, NULL, NULL, NULL, NULL, N'{"one":"ans 1","two":"ans 2","three":"ans 3","four":"ans 4"}', CAST(N'2019-10-26 12:40:22.0000000' AS DateTime2), 1, NULL, 1, 0)
SET IDENTITY_INSERT [dbo].[ad_quiz] OFF
SET IDENTITY_INSERT [dbo].[ad_slide_comments] ON

INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(13, 6, N'new comment', 0, 0, 1, CAST(N'2019-05-11 17:49:01.000' AS DateTime), CAST(N'2019-03-24 17:19:10.000' AS DateTime))
INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(14, 6, N'testing comment 123', 0, 0, 1, CAST(N'2019-05-11 17:49:04.000' AS DateTime), CAST(N'2019-03-25 02:01:45.000' AS DateTime))
INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(15, 16, N'testing comment', 1, 0, 1, CAST(N'2019-05-19 14:32:55.000' AS DateTime), CAST(N'2019-04-22 11:40:01.000' AS DateTime))
INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(16, 16, N'test comment', 1, 0, 1, CAST(N'2019-05-19 14:52:48.000' AS DateTime), CAST(N'2019-05-01 10:20:57.000' AS DateTime))
INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(17, 16, N'second test comment', 0, 0, 1, CAST(N'2019-05-11 17:49:15.000' AS DateTime), CAST(N'2019-05-01 10:27:33.000' AS DateTime))
INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(18, 3, N'testing comment', 1, 0, 1, CAST(N'2019-05-20 11:02:45.000' AS DateTime), CAST(N'2019-05-11 17:50:11.000' AS DateTime))
INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(19, 1, N'Testing Comment noti', 1, 0, 1, CAST(N'2019-05-20 00:43:49.000' AS DateTime), CAST(N'2019-05-20 00:22:20.000' AS DateTime))
INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(20, 1, N'Testing comment new', 0, 0, 1, CAST(N'2019-05-20 00:24:42.000' AS DateTime), CAST(N'2019-05-20 00:24:42.000' AS DateTime))
INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(21, 20, N'Slide Comment Last slide', 1, 0, 1, CAST(N'2019-10-16 10:52:05.247' AS DateTime), CAST(N'2019-10-16 10:52:05.247' AS DateTime))
INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(22, 28, N'Testing Comment', 0, 1, 31, CAST(N'2019-10-20 22:47:04.893' AS DateTime), CAST(N'2019-10-20 22:47:04.893' AS DateTime))
INSERT [dbo].[ad_slide_comments]
	([id], [slide_id], [comment], [status], [admin_status], [added_by], [updated_at], [created_at])
VALUES
	(23, 28, N'New comment', 0, 1, 31, CAST(N'2019-10-21 11:06:14.447' AS DateTime), CAST(N'2019-10-21 11:06:14.447' AS DateTime))
SET IDENTITY_INSERT [dbo].[ad_slide_comments] OFF
SET IDENTITY_INSERT [dbo].[ad_slides] ON

INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(3, 2, N'Piano - Driving Relaxation', N'audio', N'content/uploads/slide/audio/2155003715622394.mp3', N'Piano - Introduction Piano introduction course.', N'04:00', 4, 1, CAST(N'2019-02-13 11:22:36.0000000' AS DateTime2), NULL, CAST(N'2019-05-28 12:00:05.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(4, 2, N'How to hold your steering wheel', N'image', N'content/uploads/slide/image/2155133492010408.jpg', N'Steering Wheels:

How to hold your steering wheel. This is a sample course.', N'00:00', 5, 1, CAST(N'2019-02-28 11:52:00.0000000' AS DateTime2), NULL, CAST(N'2019-05-28 12:37:04.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(5, 3, N'Introduction to course overview', N'image', N'content/uploads/slide/image/3155176130419019.jpg', N'Introduction to course overview,  This is a text summary for testing.', N'01:18', 1, 1, CAST(N'2019-03-05 10:18:24.0000000' AS DateTime2), NULL, CAST(N'2019-03-05 10:18:24.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(6, 8, N'testing slide', N'video', N'content/uploads/slide/video/815527178661239583855.mp4', N'testing video slide', N'20', 1, 2, CAST(N'2019-03-16 12:01:06.0000000' AS DateTime2), NULL, CAST(N'2019-03-16 12:01:06.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(7, 8, N'Image slide 1', N'image', N'content/uploads/slide/image/815527179191734341785.gif', N'testing image slide', N'10', 1, 2, CAST(N'2019-03-16 12:01:59.0000000' AS DateTime2), NULL, CAST(N'2019-03-16 12:01:59.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(8, 9, N'Slide 3', N'image', N'content/uploads/slide/image/91552899535610176411.gif', N'testing slide', N'10', 3, 2, CAST(N'2019-03-18 14:28:55.0000000' AS DateTime2), NULL, CAST(N'2019-03-18 14:28:55.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(9, 9, N'slide1', N'image', N'content/uploads/slide/image/91552899568356902453.gif', N'testing slide 1', N'50', 1, 2, CAST(N'2019-03-18 14:29:28.0000000' AS DateTime2), NULL, CAST(N'2019-03-18 14:29:28.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(10, 9, N'test', N'video', N'content/uploads/slide/video/91553399585409307537.mp4', N'test', N'20', 5, 0, CAST(N'2019-03-24 09:23:05.0000000' AS DateTime2), NULL, CAST(N'2019-03-24 09:23:05.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(11, 9, N'test1212', N'video', N'content/uploads/slide/video/915533999812004662277.mp4', N'desc', N'50', 10, 0, CAST(N'2019-03-24 09:29:41.0000000' AS DateTime2), NULL, CAST(N'2019-03-24 09:29:41.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(12, 9, N'ewwerwerr', N'video', N'content/uploads/slide/video/91553403813455189472.mp4', N'eeww', N'12', 12, 0, CAST(N'2019-03-24 10:33:33.0000000' AS DateTime2), NULL, CAST(N'2019-03-24 10:33:33.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(13, 8, N'video slide', N'video', N'content/uploads/slide/video/815534044741466521774.mp4', N'video slide description', N'10', 11, 2, CAST(N'2019-03-24 10:44:34.0000000' AS DateTime2), NULL, CAST(N'2019-03-24 10:44:34.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(14, 8, N'testing neew1112', N'image', N'content/uploads/slide/image/81553458964286937654.jpg', N'testing', N'20', 2, 1, CAST(N'2019-03-25 01:52:44.0000000' AS DateTime2), NULL, CAST(N'2019-03-25 01:52:44.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(15, 20, N'malayalam slide', N'image', N'content/uploads/slide/image/2015535914861082000950.jpg', N'testing slide', N'10', 2, 0, CAST(N'2019-03-26 14:41:26.0000000' AS DateTime2), NULL, CAST(N'2019-03-26 14:41:26.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(16, 22, N'test slide 1', N'video', N'content/uploads/slide/video/221553966583166215591.mp4', N'test description', N'10', 2, 1, CAST(N'2019-03-30 22:53:03.0000000' AS DateTime2), NULL, CAST(N'2019-03-30 22:53:03.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(17, 15, N'Sample Slide', N'image', N'content/uploads/slide/image/1515578690301727939631.jpg', N'', N'10', 2, 1, CAST(N'2019-05-15 02:53:50.0000000' AS DateTime2), NULL, CAST(N'2019-05-15 02:53:50.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(18, 24, N'Sample Slide 123', N'image', N'content/uploads/slide/image/2415582947231063160563.jpg', N'', N'10', 1, 2, CAST(N'2019-05-20 01:08:43.0000000' AS DateTime2), NULL, CAST(N'2019-05-20 01:15:12.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(19, 25, N'Sample Slide', N'image', N'content/uploads/slide/image/251559021277867586945.jpg', N'<p>Slide description</p>
', N'10', 1, 1, CAST(N'2019-05-28 10:57:57.0000000' AS DateTime2), NULL, CAST(N'2019-05-28 10:57:57.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(20, 2, N'Last slide', N'video', N'content/uploads/slide/video/21559024701964241193.mp4', N'<p>Testing description</p>
', N'15', 3, 2, CAST(N'2019-05-28 11:55:01.0000000' AS DateTime2), NULL, CAST(N'2019-05-28 12:37:10.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(21, 26, N'قوانيـــن الســــير', N'image', N'content/uploads/slide/image/2615599898681635405812.jpg', N'<ol>
 <li><span dir="rtl">قوانيـــن الســــير</span></li>
</ol>
', N'10', 1, 1, CAST(N'2019-06-08 16:01:08.0000000' AS DateTime2), NULL, CAST(N'2019-06-08 16:07:31.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(22, 16, N'Testing', N'image', N'content/uploads/slide/image/161570863736280479546.jpg', N'', N'10', 1, 0, CAST(N'2019-10-12 12:32:17.0000000' AS DateTime2), NULL, CAST(N'2019-10-12 12:32:17.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(23, 16, N'Testing', N'image', N'content/uploads/slide/image/161570863807866783751.jpg', N'', N'10', 1, 0, CAST(N'2019-10-12 12:33:28.0000000' AS DateTime2), NULL, CAST(N'2019-10-12 12:33:28.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(24, 28, N'Sample Slide', N'image', N'content/uploads/slide/image/281571054088565429207.png', N'', N'10', 2, 1, CAST(N'2019-10-14 17:24:49.0000000' AS DateTime2), NULL, CAST(N'2019-10-14 17:24:49.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(26, 35, N'Piano - Driving Relaxation', N'audio', N'content/uploads/slide/audio/2155003715622394.mp3', N'Piano - Introduction Piano introduction course.', N'04:00', 4, 1, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(27, 35, N'How to hold your steering wheel', N'image', N'content/uploads/slide/image/2155133492010408.jpg', N'Steering Wheels:

How to hold your steering wheel. This is a sample course.', N'00:00', 5, 1, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), NULL, CAST(N'2019-10-18 12:05:11.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(29, 39, N'Slide 1', N'video', N'content/uploads/slide/video/391572318395313907856.mp4', N'<p>This is description area</p>
', N'4.55', 1, 1, CAST(N'2019-10-29 08:36:36.0000000' AS DateTime2), NULL, CAST(N'2019-10-29 08:36:36.0000000' AS DateTime2), 0)
INSERT [dbo].[ad_slides]
	([id], [lesson_id], [slide_title], [slide_mode], [slide_file], [slide_description], [slide_duration], [slide_order], [created_by], [created_on], [updated_by], [updated_on], [publish_status])
VALUES
	(30, 39, N'Slide 2', N'video', N'content/uploads/slide/video/3915723194631033802071.mp4', N'<p>Slide 2 description</p>
', N'4.55', 2, 1, CAST(N'2019-10-29 08:54:24.0000000' AS DateTime2), NULL, CAST(N'2019-10-29 08:54:24.0000000' AS DateTime2), 0)
SET IDENTITY_INSERT [dbo].[ad_slides] OFF
SET IDENTITY_INSERT [dbo].[ad_staff] ON

INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(1, N'Admin', N'admin@educationapp.com', N'$2y$10$uqfwk0rM.IDQwA.Kwwv0JOfH1VVRKWgqe6ojJq0Q0QnE7iThih8Y6', N'9876543210', 0, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2018-11-28 11:19:53.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(2, N'Faculty', N'faculty@educationapp.com', N'$2y$10$uqfwk0rM.IDQwA.Kwwv0JOfH1VVRKWgqe6ojJq0Q0QnE7iThih8Y6', N'784596310', 1, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2018-12-20 10:24:41.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(4, N'Jino Mukesh', N'jino@test.com', N'$2y$10$6IntcRCdOy/n6azc9r8uSuIp3cBw/ggnQrMR.RXNzg6UkOk6OGnya', N'7845129630', 0, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2019-01-02 10:21:24.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(7, N'Mukesh MB', N'mukesh@test.com', N'$2y$10$WWXTFhDTsR7fEuDA4UjJU.mKVrGbSZW4kpEPCXvrCIS9qxcuH4En.', N'875421854112', 0, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2019-01-02 10:31:37.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(9, N'Sobin', N'sobin@educationapp.com', N'$2y$10$7Os/MWY8bv4PHoHdti0vuupn7lMiiV4infiOeBvczlfVsIFxptNDq', N'7845129630', 1, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2019-01-05 10:32:08.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(10, N'Soumya JH', N'soumya@gmail.com', N'$2y$10$LqOaT4pGSp0romnv8SVWIeFftFzgNCwcIVKCV.xfM3kHRxjz77nEC', N'9876543210', 0, 0, N'', CAST(N'2019-05-11 23:05:46.0000000' AS DateTime2), CAST(N'2019-01-18 12:26:09.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(25, N'testing admin', N'admin@matrimonial.com', N'$2y$10$gfVXn6IG.tmvDgk5SPcvse0sSG/6CeGJ4CXrgaVCicBAr7zaCRRnO', N'8787878787', 0, 0, N'0', CAST(N'2019-10-01 16:11:07.0000000' AS DateTime2), CAST(N'2019-10-01 16:11:07.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(26, N'Sobin12', N'admin@admin.com', N'$2y$10$JmHkksNolCypmNM8JeOcYOSjEMcJxmTcEJWwF/.6gx9qZczyTverK', N'7845129630', 0, 0, N'0', CAST(N'2019-10-01 18:23:06.0000000' AS DateTime2), CAST(N'2019-10-01 18:23:06.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(28, N'Trainer', N'trainer@trainer.com', N'$2y$10$o.p.s9F4ydZLPfVN5DAnZOgbNjcK7kCzmp.d47vtwHhbKZHpqTDpy', N'7845129630', 1, 0, N'0', CAST(N'2019-10-01 18:34:13.0000000' AS DateTime2), CAST(N'2019-10-01 18:34:13.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(29, N'New Admin', N'newadmin@educationapp.com', N'$2y$10$KMhTu/x4wRDskd7JTywOQeJX3bCnbsZ6GaYasV6nk3ka9UV1S3bKO', N'7894561230', 0, 0, N'0', CAST(N'2019-10-11 19:57:04.0000000' AS DateTime2), CAST(N'2019-10-11 19:57:04.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(30, N'Higher Management', N'hm@educationapp.com', N'$2y$10$mFjpPKYGQ3./bTxRyejvkeXhqpYuKjXxhMC2mbCX9AWchhVnTeyT.', N'8787878787', 3, 0, N'0', CAST(N'2019-10-20 19:21:51.0000000' AS DateTime2), CAST(N'2019-10-20 19:21:51.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(31, N'Quality', N'quality@educationapp.com', N'$2y$10$gI8TlRDp29eg28HGk0gq/OGaKaxcedWCsrIRpT3fBaMRVPyyfoS4C', N'8787878787', 2, 0, N'0', CAST(N'2019-10-20 22:28:33.0000000' AS DateTime2), CAST(N'2019-10-20 22:28:33.0000000' AS DateTime2))
INSERT [dbo].[ad_staff]
	([id], [name], [email], [password], [contact_number], [role], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(32, N'Quality', N'quality1@educationapp.com', N'$2y$10$WlQ.aaNhyTEhlSEDg2QQVuOtKMpr8eqjdMGcZ/Adj1j11LAna5kR2', N'8787878787', 2, 0, N'0', CAST(N'2019-10-29 09:49:52.0000000' AS DateTime2), CAST(N'2019-10-29 09:49:52.0000000' AS DateTime2))
SET IDENTITY_INSERT [dbo].[ad_staff] OFF
SET IDENTITY_INSERT [dbo].[ad_student] ON

INSERT [dbo].[ad_student]
	([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(1, N'Student', N'222', N'222', N'222', N'258-9586-986542', N'student@educationapp.com', N'$2y$10$crI.A8IFva9YbHYbvnY.L.Mq.8z/G9tuPW1GVrRGkS2M7aaiC8PXe', N'784521058', 0, 0, 0, 0, N'', CAST(N'2019-05-11 23:05:06.0000000' AS DateTime2), CAST(N'2018-12-20 11:14:26.0000000' AS DateTime2))
INSERT [dbo].[ad_student]
	([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(2, N'Ram Thilak', N'', N'', N'', N'', N'ramthilak@gmail.com', N'$2y$10$V7/99nNsFkQtgzYE4OO5eOPDT5Ap4FwfeqL3fiPIzKiWIhQ8DH2Da', N'8526391', 0, 0, 0, 0, N'', CAST(N'2019-05-11 23:05:06.0000000' AS DateTime2), CAST(N'2019-01-05 10:45:09.0000000' AS DateTime2))
INSERT [dbo].[ad_student]
	([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(3, N'Aishwariya', N'', N'', N'', N'', N'aishwariya@gmail.com', N'$2y$10$06wqMdz.5BXEuu9EU0kow.XncC9JkS9in0e1ADg2iwfPjbjnhfMn2', N'741852096', 0, 0, 0, 0, N'', CAST(N'2019-05-11 23:05:06.0000000' AS DateTime2), CAST(N'2019-01-05 10:46:55.0000000' AS DateTime2))
INSERT [dbo].[ad_student]
	([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(4, N'Shaemin', N'859-6895-256895', N'', N'', N'258-9586-986542', N'shaemin@educationapp.com', N'$2y$10$8IoYiPBRc2ICQSonqxIxs./xsk84.SbiGVgNFqieu4Aenk73FBaHG', N'7896543210', 0, 0, 0, 0, N'', CAST(N'2019-05-11 23:05:06.0000000' AS DateTime2), CAST(N'2019-03-06 12:05:58.0000000' AS DateTime2))
INSERT [dbo].[ad_student]
	([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(6, N'SAID WALI KHAN GUL DARAZ KHAN', N'1111', N'111', N'111', NULL, N'student@domain.com', N'', N'0', 0, 0, 0, 0, N'', CAST(N'2019-05-15 00:37:52.0000000' AS DateTime2), CAST(N'2019-05-15 00:37:52.0000000' AS DateTime2))
INSERT [dbo].[ad_student]
	([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(7, N'MAI JASSIM MOHAMED ALI AL HAMMADI', N'112', N'112', N'112', NULL, N'student@domain.com', N'', N'0', 0, 2, 1, 0, N'', CAST(N'2019-05-15 01:31:16.0000000' AS DateTime2), CAST(N'2019-05-15 01:31:16.0000000' AS DateTime2))
INSERT [dbo].[ad_student]
	([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(15, N'FATEMA YOSEF HASAN MOHAMAD ALHAMMADI', N'123', N'123', N'123', NULL, N'student@domain.com', N'', N'0', 0, 2, 1, 0, N'', CAST(N'2019-05-19 11:36:51.0000000' AS DateTime2), CAST(N'2019-05-19 11:36:51.0000000' AS DateTime2))
INSERT [dbo].[ad_student]
	([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(16, N'Test Name', N'111', N'111', N'111', NULL, N'student@domain.com', N'', N'0', 0, 2, 1, 0, N'', CAST(N'2019-06-14 13:49:28.0000000' AS DateTime2), CAST(N'2019-06-14 13:49:28.0000000' AS DateTime2))
INSERT [dbo].[ad_student]
	([id], [name], [student_idno], [trafficNumber], [fileNumber], [emirates_idno], [email], [password], [contact_number], [role], [no_of_lessons], [vip], [remember_me], [remember_token], [last_login], [created_time])
VALUES
	(20, N'SAFIYEH MOHAMMAD DARYANA VARD', N'125', N'125', N'125', NULL, N'student@domain.com', N'password123', N'0', 0, 2, 1, 0, NULL, CAST(N'2019-09-30 13:17:40.0000000' AS DateTime2), CAST(N'2019-09-30 13:17:40.0000000' AS DateTime2))
SET IDENTITY_INSERT [dbo].[ad_student] OFF
SET IDENTITY_INSERT [dbo].[employee_list] ON

INSERT [dbo].[employee_list]
	([id], [Emp_no], [UserName], [Name])
VALUES
	(1, 1, N'admin01', N'Admin')
INSERT [dbo].[employee_list]
	([id], [Emp_no], [UserName], [Name])
VALUES
	(2, 2, N'trainer01', N'Trainer')
INSERT [dbo].[employee_list]
	([id], [Emp_no], [UserName], [Name])
VALUES
	(3, 3, N'hm01', N'HM')
INSERT [dbo].[employee_list]
	([id], [Emp_no], [UserName], [Name])
VALUES
	(4, 4, N'qa01', N'Quality')
SET IDENTITY_INSERT [dbo].[employee_list] OFF
SET IDENTITY_INSERT [dbo].[notifications] ON

INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(112, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-20 00:20:50.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(113, 1, N'Admin', N'Admin', N'', 0, N'', N'Admin Comment', N'http://localhost/eduapp/admin/lesson/summary/bFZHcDF0alhzWTYvZGtYZTc1ZyswUT09', CAST(N'2019-05-20 00:24:42.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(114, 0, N'Faculty', N'Trainer', N'', 0, N'', N'Login', N'', CAST(N'2019-05-20 00:31:53.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(115, 2, N'Faculty', N'Trainer', N'', 0, N'', N'Comment Updated', N'http://localhost/eduapp/admin/lesson/summary/bFZHcDF0alhzWTYvZGtYZTc1ZyswUT09', CAST(N'2019-05-20 00:43:49.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(116, 2, N'Faculty', N'Trainer', N'', 0, N'', N'Quiz Updated', N'http://localhost/eduapp/admin/quiz/preview_quiz/c3N3SzNuTXhITDNvRjlQb2RKU0s0UT09', CAST(N'2019-05-20 00:53:23.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(117, 2, N'Faculty', N'Trainer', N'', 0, N'Sample Slide 123', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/TFd1VmxhYUVIbGhjMkprSEtBQkVOQT09', CAST(N'2019-05-20 01:15:12.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(118, 0, N'Faculty', N'Trainer', N'', 0, N'', N'Login', N'', CAST(N'2019-05-20 10:51:09.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(119, 2, N'Faculty', N'Trainer', N'', 0, N'', N'Comment Updated', N'http://localhost/eduapp/admin/lesson/summary/WEEvaENpL3VyK3BxTER3cTFYYVJqUT09', CAST(N'2019-05-20 11:02:45.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(120, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-20 21:59:07.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(121, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-27 10:13:31.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(122, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-27 22:52:41.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(123, 1, N'Admin', N'Admin', N'', 0, N'School Bus Driver', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-27 22:53:03.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(124, 1, N'Admin', N'Admin', N'', 0, N'School Bus Driver', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-27 23:41:20.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(125, 1, N'Admin', N'Admin', N'', 0, N'School Bus Driver', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-27 23:42:38.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(126, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-28 10:28:52.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(127, 1, N'Admin', N'Admin', N'', 0, N'School Bus Driver', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-28 10:29:06.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(128, 1, N'Admin', N'Admin', N'', 0, N'School Bus Driver', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-28 10:39:07.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(129, 1, N'Admin', N'Admin', N'', 0, N'No License', N'Course Published', N'', CAST(N'2019-05-28 10:44:41.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(130, 1, N'Admin', N'Admin', N'', 0, N'No License', N'Course Published', N'', CAST(N'2019-05-28 10:50:44.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(131, 1, N'Admin', N'Admin', N'', 0, N'Sample Slide', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-28 10:57:57.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(132, 0, N'Faculty', N'Trainer', N'', 0, N'', N'Login', N'', CAST(N'2019-05-28 11:43:52.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(133, 5, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-05-28 11:47:18.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(134, 2, N'Faculty', N'Trainer', N'', 0, N'Last slide', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-05-28 11:55:01.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(135, 2, N'Faculty', N'Trainer', N'', 0, N'Last slide', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/bHNHLytmNjNHYjU2aUJPTlJDNzhyQT09', CAST(N'2019-05-28 11:56:23.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(136, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-05-30 20:33:06.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(137, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-08 15:35:44.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(138, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-08 15:58:55.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(139, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-06-08 16:01:08.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(140, 1, N'Admin', N'Admin', N'', 0, N'Left hand driving', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-06-08 16:04:17.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(141, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-08 16:07:31.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(142, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-10 19:46:00.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(143, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-11 15:22:14.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(144, 1, N'Admin', N'Admin', N'', 0, N'Left hand driving', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-06-11 15:47:05.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(145, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-11 16:34:17.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(146, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-11 16:34:44.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(147, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-11 16:35:06.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(148, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-11 16:35:57.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(149, 1, N'Admin', N'Admin', N'', 0, N'????????? ?????????', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/cDNMaHAxblF0SDVOUkxxdmpFRm1sZz09', CAST(N'2019-06-11 16:36:03.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(150, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-14 13:39:40.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(151, 1, N'Admin', N'Admin', N'', 0, N'Motor Cycle', N'Course Published', N'', CAST(N'2019-06-14 13:41:25.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(152, 16, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-06-14 13:49:28.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(153, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-06-14 14:01:10.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(154, 1, N'Admin', N'Admin', N'', 0, N'Motor Cycle', N'Course Updated', N'http://localhost/eduapp/admin/course/', CAST(N'2019-06-14 15:58:51.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(155, 16, N'Test Name', N'Student', N'', 0, N'Left hand driving', N'Completed', N'', CAST(N'2019-06-14 16:03:20.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(156, 16, N'Test Name', N'Student', N'', 0, N'Left hand driving', N'Completed', N'', CAST(N'2019-06-14 16:03:23.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(157, 16, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-06-14 16:26:02.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(158, 16, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-06-17 17:46:59.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(159, 16, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-06-19 05:58:11.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(160, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-07-26 21:26:48.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(161, 16, N'Test Name', N'Student', N'', 0, N'', N'Login', N'', CAST(N'2019-08-02 23:07:15.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(162, 16, N'Test Name', N'Student', N'', 0, N'Left hand driving', N'Completed', N'', CAST(N'2019-08-02 23:08:15.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(163, 16, N'Test Name', N'Student', N'', 0, N'Left hand driving', N'Completed', N'', CAST(N'2019-08-02 23:08:20.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(164, 0, N'Admin', N'Admin', N'', 0, N'', N'Login', N'', CAST(N'2019-09-11 18:09:54.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(172, 16, N'Test Name', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-09-30 12:33:11.350' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(173, 16, N'Test Name', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-09-30 12:34:42.387' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(174, 20, N'SAFIYEH MOHAMMAD DARYANA VARD', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-09-30 13:24:06.113' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(175, 20, N'SAFIYEH MOHAMMAD DARYANA VARD', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-09-30 13:24:27.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(176, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-01 14:22:04.633' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(177, 20, N'SAFIYEH MOHAMMAD DARYANA VARD', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-01 22:10:19.450' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(178, 0, N'Faculty', N'Trainer', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-01 22:26:28.077' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(179, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-10 21:16:06.220' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(180, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-10 21:26:39.623' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(181, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-11 19:56:26.613' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(182, 0, N'New Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-11 19:57:27.977' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(185, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-12 20:16:51.953' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(186, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-13 19:23:59.703' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(187, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-14 17:00:47.080' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(188, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-14 17:14:06.750' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(189, 1, N'Admin', N'Admin', NULL, 0, N'Sample Slide', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-10-14 17:24:48.680' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(190, 1, N'Admin', N'Admin', NULL, 0, N'Sample Slide', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-10-14 18:16:03.860' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(191, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-14 23:51:15.933' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(192, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-15 11:01:48.297' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(193, 0, N'Faculty', N'Trainer', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-15 11:02:21.177' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(194, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-15 23:20:55.083' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(195, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-15 23:25:43.487' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(196, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-15 23:35:24.727' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(197, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-16 10:32:25.210' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(198, 1, N'Admin', N'Admin', NULL, 0, NULL, N'Admin Comment', N'http://localhost/eduapp/admin/lesson/summary/bHNHLytmNjNHYjU2aUJPTlJDNzhyQT09', CAST(N'2019-10-16 10:52:05.287' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(199, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-17 10:22:12.763' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(200, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-18 11:55:00.890' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(202, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-18 23:40:00.457' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(203, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-19 11:07:55.377' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(204, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-20 19:21:22.930' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(205, 0, N'Higher Management', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-20 19:22:09.750' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(206, 30, N'Higher Management', N'Trainer', NULL, 0, N'Last slide', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/a0ZiR3BnNDRXWHNoUWtreXF2L3R0Zz09', CAST(N'2019-10-20 20:56:45.133' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(207, 30, N'Higher Management', N'Trainer', NULL, 0, N'Last slide', N'Slide Updated', N'http://localhost/eduapp/admin/lesson/preview/a0ZiR3BnNDRXWHNoUWtreXF2L3R0Zz09', CAST(N'2019-10-20 20:56:50.027' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(208, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-20 22:28:01.340' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(209, 0, N'Quality', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-20 22:28:55.323' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(210, 31, N'Quality', N'Trainer', NULL, 0, NULL, N'Admin Comment', N'http://localhost/eduapp/admin/lesson/summary/a0ZiR3BnNDRXWHNoUWtreXF2L3R0Zz09', CAST(N'2019-10-20 22:47:04.903' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(211, 0, N'Faculty', N'Trainer', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-20 22:51:11.760' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(212, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-21 00:50:52.230' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(213, 0, N'Quality', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-21 11:04:34.697' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(214, 31, N'Quality', N'Trainer', NULL, 0, NULL, N'Admin Comment', N'http://localhost/eduapp/admin/lesson/summary/a0ZiR3BnNDRXWHNoUWtreXF2L3R0Zz09', CAST(N'2019-10-21 11:06:14.450' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(215, 0, N'Faculty', N'Trainer', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-21 11:07:48.703' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(216, 0, N'Higher Management', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-21 12:17:49.837' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(217, 0, N'Higher Management', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-21 12:21:35.723' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(218, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-21 15:29:26.480' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(219, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-24 12:16:20.903' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(220, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-24 13:50:43.207' AS DateTime))
GO
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(221, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-24 13:51:16.710' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(222, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-24 15:39:15.897' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(223, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-24 15:40:56.450' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(224, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-24 18:08:28.317' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(225, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-25 01:58:25.763' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(226, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-25 09:56:30.930' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(227, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-25 10:51:05.010' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(228, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-25 10:54:03.090' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(229, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-25 10:54:36.900' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(230, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-25 10:55:22.670' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(231, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-25 11:01:35.320' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(232, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-25 13:21:40.430' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(233, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-25 15:07:33.110' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(234, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-26 11:15:30.633' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(236, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-26 12:39:23.293' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(237, 1, N'Admin', N'Admin', NULL, 0, NULL, N'Quiz Added', N'http://localhost/eduapp/admin/course', CAST(N'2019-10-26 12:40:21.663' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(239, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-26 17:34:56.747' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(240, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-26 19:58:46.880' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(241, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-26 20:29:46.367' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(242, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-26 20:33:02.937' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(243, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 15:35:18.050' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(244, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 16:12:31.643' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(245, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 16:17:47.713' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(246, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 16:21:07.470' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(247, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 16:23:42.483' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(248, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 16:44:19.373' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(249, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 21:16:52.987' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(250, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 21:42:36.387' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(251, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 22:27:37.177' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(252, 0, N'Faculty', N'Trainer', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 22:51:33.483' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(253, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-27 23:46:08.450' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(254, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-28 11:17:42.763' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(255, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-28 11:30:09.660' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(256, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-28 12:05:52.087' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(258, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-28 12:56:10.973' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(259, 0, N'Faculty', N'Trainer', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-28 17:51:02.863' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(260, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-28 18:06:43.290' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(261, 0, N'Faculty', N'Trainer', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-28 18:19:55.793' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(262, 2, N'Faculty', N'Trainer', NULL, 0, NULL, N'Comment Updated', N'http://localhost/eduapp/admin/lesson/summary/bHNHLytmNjNHYjU2aUJPTlJDNzhyQT09', CAST(N'2019-10-28 18:24:30.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(263, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-28 18:53:52.000' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(264, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-28 21:26:27.040' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(265, 14, N'111', N'Student', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-28 21:30:29.827' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(266, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-29 03:00:30.970' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(267, 0, N'Admin', N'Admin', NULL, 0, NULL, N'Login', NULL, CAST(N'2019-10-29 08:24:13.393' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(268, 1, N'Admin', N'Admin', NULL, 0, N'Slide 1', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-10-29 08:36:35.997' AS DateTime))
INSERT [dbo].[notifications]
	([id], [user], [name], [user_type], [type], [notify_to], [course], [status], [url], [created_at])
VALUES
	(269, 1, N'Admin', N'Admin', NULL, 0, N'Description', N'Slide Added', N'http://localhost/eduapp/admin/course/', CAST(N'2019-10-29 08:54:23.880' AS DateTime))
SET IDENTITY_INSERT [dbo].[notifications] OFF
SET IDENTITY_INSERT [dbo].[student_list] ON

INSERT [dbo].[student_list]
	([id], [StudentNo], [TrafficNo], [TryFileNo], [NameEng], [eNameAr], [BranchNo])
VALUES
	(14, 111, 111, 111, N'abc', N'و', 111)
SET IDENTITY_INSERT [dbo].[student_list] OFF
SET IDENTITY_INSERT [dbo].[student_table] ON

INSERT [dbo].[student_table]
	([id], [StudentNo], [TrafficNo], [TryFileNo], [NameEng], [NameAr], [BranchNo], [EmiratesID])
VALUES
	(14, 111, N'111', N'111', N'111', N'111', 1, 111)
SET IDENTITY_INSERT [dbo].[student_table] OFF
SET IDENTITY_INSERT [dbo].[studentcoursedetails] ON

INSERT [dbo].[studentcoursedetails]
	([id], [CourseRef], [LessonCode], [LessonDescription], [BookedDate], [Attendance], [ByPass], [Order], [StudentNo], [TrafficfileNo], [TryfileNo], [BranchNo])
VALUES
	(1, N'2670514', N'L1', N'Lesson 1', CAST(N'2019-07-20' AS Date), N'Present', N'No', 1, 111, N'111', N'111', 1)
INSERT [dbo].[studentcoursedetails]
	([id], [CourseRef], [LessonCode], [LessonDescription], [BookedDate], [Attendance], [ByPass], [Order], [StudentNo], [TrafficfileNo], [TryfileNo], [BranchNo])
VALUES
	(2, N'2670514', N'L2', N'Lesson 2', CAST(N'2019-07-20' AS Date), N'Present', N'No', 3, 111, N'111', N'111', 1)
INSERT [dbo].[studentcoursedetails]
	([id], [CourseRef], [LessonCode], [LessonDescription], [BookedDate], [Attendance], [ByPass], [Order], [StudentNo], [TrafficfileNo], [TryfileNo], [BranchNo])
VALUES
	(3, N'2670514', N'L3', N'Lesson 3', CAST(N'2019-07-20' AS Date), N'Present', N'No', 2, 111, N'111', N'111', 1)
INSERT [dbo].[studentcoursedetails]
	([id], [CourseRef], [LessonCode], [LessonDescription], [BookedDate], [Attendance], [ByPass], [Order], [StudentNo], [TrafficfileNo], [TryfileNo], [BranchNo])
VALUES
	(4, N'2670513', N'L1', N'Lesson 1', CAST(N'2019-07-20' AS Date), N'Present', N'No', 5, 111, N'111', N'111', 1)
INSERT [dbo].[studentcoursedetails]
	([id], [CourseRef], [LessonCode], [LessonDescription], [BookedDate], [Attendance], [ByPass], [Order], [StudentNo], [TrafficfileNo], [TryfileNo], [BranchNo])
VALUES
	(5, N'2670513', N'L2', N'Lesson 2', CAST(N'2019-07-20' AS Date), N'Present', N'No', 4, 111, N'111', N'111', 1)
SET IDENTITY_INSERT [dbo].[studentcoursedetails] OFF
SET IDENTITY_INSERT [dbo].[studentcourses] ON

INSERT [dbo].[studentcourses]
	([id], [CourseRef], [TryFileNo], [TrainingExpiry], [PaymentExpiry], [Branch], [EducationLanguage], [LicenseType], [NoOfLessonsPerDay], [ExamBookingDate], [StudentNo], [TrafficfileNo], [BranchNo], [ExamStatus])
VALUES
	(1, 2670513, N'111               ', CAST(N'2019-07-20' AS Date), CAST(N'2020-01-20' AS Date), 1, N'AR        ', N'Light vehicle     ', 2, CAST(N'2019-07-01' AS Date), 111, N'111', 1, N'Failed')
INSERT [dbo].[studentcourses]
	([id], [CourseRef], [TryFileNo], [TrainingExpiry], [PaymentExpiry], [Branch], [EducationLanguage], [LicenseType], [NoOfLessonsPerDay], [ExamBookingDate], [StudentNo], [TrafficfileNo], [BranchNo], [ExamStatus])
VALUES
	(5, 2670514, N'111               ', CAST(N'2019-08-20' AS Date), CAST(N'2020-02-20' AS Date), 1, N'AR        ', N'Light Vehicle     ', 2, CAST(N'2019-08-01' AS Date), 111, N'111', 1, NULL)
SET IDENTITY_INSERT [dbo].[studentcourses] OFF
SET IDENTITY_INSERT [dbo].[Table_Lesson] ON

INSERT [dbo].[Table_Lesson]
	([id], [Code], [Description])
VALUES
	(1, N'L1', N'Lesson 1')
INSERT [dbo].[Table_Lesson]
	([id], [Code], [Description])
VALUES
	(2, N'L2', N'Lesson 2')
INSERT [dbo].[Table_Lesson]
	([id], [Code], [Description])
VALUES
	(3, N'L3', N'Lesson 3')
INSERT [dbo].[Table_Lesson]
	([id], [Code], [Description])
VALUES
	(4, N'L4', N'Lesson 4')
INSERT [dbo].[Table_Lesson]
	([id], [Code], [Description])
VALUES
	(5, N'L5', N'Lesson 5')
INSERT [dbo].[Table_Lesson]
	([id], [Code], [Description])
VALUES
	(6, N'L6', N'Lesson 6')
INSERT [dbo].[Table_Lesson]
	([id], [Code], [Description])
VALUES
	(7, N'L7', N'Lesson 7')
INSERT [dbo].[Table_Lesson]
	([id], [Code], [Description])
VALUES
	(8, N'L8', N'Lesson 8')
INSERT [dbo].[Table_Lesson]
	([id], [Code], [Description])
VALUES
	(9, N'L9', N'Lesson 9')
INSERT [dbo].[Table_Lesson]
	([id], [Code], [Description])
VALUES
	(10, N'L10', N'Lesson 10')
SET IDENTITY_INSERT [dbo].[Table_Lesson] OFF
/****** Object:  StoredProcedure [dbo].[_sp_el_employees]    Script Date: 29-10-2019 10:03:16 AM ******/
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
/****** Object:  StoredProcedure [dbo].[_sp_el_lessons]    Script Date: 29-10-2019 10:03:16 AM ******/
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
/****** Object:  StoredProcedure [dbo].[_sp_el_studentauth]    Script Date: 29-10-2019 10:03:16 AM ******/
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
	SELECT TOP 1000
		[id]
      , [StudentNo]
      , [TrafficNo]
      , [TryFileNo]
      , [NameEng]
      , [NameAr]
      , [BranchNo]
      , [EmiratesID]
	FROM [educationapp].[dbo].[student_table]
	where StudentNo=@StudentNo AND TrafficNo=@TrafficNo AND TryFileNo=@fileNo AND BranchNo=@BranchNo
;
--SELECT [StudentNo],[NameEng],[NameAr],[EmiratesID],[TrafficNo],[TryFileNo] from student_list where StudentNo=@StudentNo AND TrafficNo=@TrafficNo AND TryFileNo=@fileNo AND BranchNo=@BranchNo ;
END

GO
/****** Object:  StoredProcedure [dbo].[_sp_el_studentcoursedetails]    Script Date: 29-10-2019 10:03:16 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[_sp_el_studentcoursedetails]
	-- Add the parameters for the stored procedure here
	@StudentNo int ,
	@TrafficNo nvarchar(18),
	@fileNo nvarchar(18),
	@BranchNo int,
	@CourseRef int



AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

	-- Insert statements for procedure here
	SELECT *
	FROM studentcoursedetails
	where StudentNo=@StudentNo AND TrafficfileNo=@TrafficNo AND TryFileNo=@fileNo AND BranchNo=@BranchNo AND CourseRef=@CourseRef
	order by [dbo].[studentcoursedetails].[Order]
--SELECT [StudentNo],[NameEng],[NameAr],[EmiratesID],[TrafficNo],[TryFileNo] from student_list where StudentNo=@StudentNo AND TrafficNo=@TrafficNo AND TryFileNo=@fileNo AND BranchNo=@BranchNo ;
END

GO
/****** Object:  StoredProcedure [dbo].[_sp_el_studentcourses]    Script Date: 29-10-2019 10:03:16 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[_sp_el_studentcourses]
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
	SELECT *
	FROM studentcourses
	where StudentNo=@StudentNo AND TrafficfileNo=@TrafficNo AND TryFileNo=@fileNo AND BranchNo=@BranchNo;
--SELECT [StudentNo],[NameEng],[NameAr],[EmiratesID],[TrafficNo],[TryFileNo] from student_list where StudentNo=@StudentNo AND TrafficNo=@TrafficNo AND TryFileNo=@fileNo AND BranchNo=@BranchNo ;
END

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
