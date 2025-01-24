-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 24, 2025 at 03:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stbjobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicationform`
--

CREATE TABLE `applicationform` (
  `applicationFormID` int(8) NOT NULL,
  `employeeResume` varchar(300) NOT NULL,
  `firstAnswer` varchar(3000) NOT NULL,
  `secondAnswer` varchar(3000) NOT NULL,
  `sentDate` datetime NOT NULL DEFAULT current_timestamp(),
  `userID` int(8) NOT NULL,
  `jobDetailID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicationform`
--

INSERT INTO `applicationform` (`applicationFormID`, `employeeResume`, `firstAnswer`, `secondAnswer`, `sentDate`, `userID`, `jobDetailID`) VALUES
(22, '20250124220009_resume-sample.pdf', 'I am passionate about baking and have a strong dedication to producing high-quality baked goods. I work well as part of a team, adapt quickly to new environments, and am eager to contribute to the success of your business. I am confident that my enthusiasm for learning and my commitment to excellence will make me a valuable addition to your team.', 'My expected salary is PHP 9,000, in line with the offered rate for the position. While I am at the entry level, I bring a strong work ethic, a willingness to learn, and a genuine passion for baking. I understand that this role involves dedication and teamwork, and I am eager to grow my skills and contribute to the quality of your products.', '2025-01-24 22:00:09', 50, 18);

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `helpID` int(8) NOT NULL,
  `shortDescription` varchar(100) NOT NULL,
  `longDescription` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`helpID`, `shortDescription`, `longDescription`) VALUES
(1, 'How to get started?', 'To get started, create an account by clicking the \"Create an account\" button on the homepage. Fill in your name, email address, and password, then verify your email to activate your account. Once registered, setting up your profile is simple. Log in, navigate to My Profile, upload a professional photo, and add a summary highlighting your skills, experiences, and career goals. Don’t forget to include details about your work experience, education, and certifications to make your profile stand out to potential employers.\r\n'),
(2, 'How do I search for jobs?\r\n', 'Searching for jobs is easy with our platform. Head to the Job Search page and enter keywords, job titles, or company names in the search bar. Use filters such as location, salary, and job type to refine your results. When you find a job you’re interested in, click on the listing to view the details.\r\n'),
(3, 'How do I apply for a job?\r\n', 'Applying for jobs is straightforward. On the job details page, click the Apply Now button. You’ll be prompted to upload your resume, which should be in .pdf, .doc, or .docx format (maximum size: 5MB).\r\n'),
(4, 'I’m not receiving email notifications. What should I do?\r\n', 'If you encounter any issues, our troubleshooting tips can help. For example, if you’re not receiving email notifications, check your spam or junk folder and ensure your email preferences are correctly configured under Settings. Should you find a technical issue, visit our Contact Us page.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `jobdetail`
--

CREATE TABLE `jobdetail` (
  `jobDetailID` int(10) NOT NULL,
  `jobLocation` varchar(300) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `salaryRate` int(10) NOT NULL,
  `experienceLevel` varchar(50) NOT NULL,
  `jobIndustry` varchar(50) NOT NULL,
  `fullDescription` varchar(3000) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `jobSkillsDescription` varchar(1000) NOT NULL,
  `letterID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobdetail`
--

INSERT INTO `jobdetail` (`jobDetailID`, `jobLocation`, `jobTitle`, `salaryRate`, `experienceLevel`, `jobIndustry`, `fullDescription`, `companyName`, `jobSkillsDescription`, `letterID`) VALUES
(12, 'San Antonio', 'Software Enginner', 9999, 'Entry Level', 'Information Technology', 'Role of a Software Engineer:\nA Software Engineer is a highly skilled professional responsible for designing, developing, testing, and maintaining software applications and systems that address specific user needs and organizational goals. They work collaboratively with cross-functional teams, including product managers, designers, and quality assurance specialists, to gather and analyze user requirements, ensuring that the final software solution is functional, efficient, and scalable. Their responsibilities extend to writing clean, optimized code, conducting rigorous testing to identify and fix bugs, and maintaining software systems to ensure they remain up-to-date with the latest technological advancements. Software Engineers also stay abreast of industry trends and emerging technologies to incorporate innovative solutions into their work.', 'TechNova Solutions', 'Proficiency in Programming Languages:\r\nDemonstrates a strong command of programming languages such as Java, Python, C++, JavaScript, or similar, with the ability to write clean, efficient, and maintainable code. Skilled in leveraging these languages to develop complex algorithms, build scalable applications, and optimize software performance. Familiar with best practices in coding, debugging, and testing to ensure high-quality software development.', 0),
(13, 'San Vicente', 'Administrative Assistant', 49999, 'Mid Level', 'Business and Administration', 'Administrative Support and Daily Operations:\r\nProviding administrative support involves managing schedules, organizing meetings, preparing reports, and maintaining documentation to ensure smooth daily operations. This role requires excellent organizational skills, attention to detail, and the ability to multitask effectively. Responsibilities also include coordinating with various departments to streamline workflows, handling correspondence, and addressing any operational challenges promptly to maintain efficiency.', 'AdminPros Ltd.', 'Proficiency in Microsoft Office Suite and Organizational Skills:\r\nHighly skilled in using Microsoft Office Suite, including Word, Excel, PowerPoint, and Outlook, to create detailed reports, presentations, and manage project documentation. Possesses excellent organizational skills to prioritize tasks, manage multiple projects simultaneously, and maintain efficient workflows. Capable of handling deadlines and delivering results in fast-paced environments.', 0),
(15, 'San Pedro', 'Warehouse Assistant Supervisor', 25001, 'Senior Level', 'Manufacturing and Logistics', 'Warehouse and Inventory Management:\r\nOverseeing warehouse operations involves managing inventory levels, tracking stock movements, and ensuring timely and accurate shipments. This role requires strong leadership skills to supervise warehouse staff, implement efficient storage and retrieval systems, and ensure compliance with safety and operational standards. Responsibilities also include monitoring inventory to prevent shortages or overstocking, maintaining accurate records, and using advanced inventory management systems to streamline operations.', 'LogisticMasters Corp.	', 'Knowledge of Inventory Management Systems and Multitasking:\r\nComprehensive understanding of inventory management systems, including tools and software used for tracking, ordering, and maintaining stock levels. Proven ability to multitask effectively, balancing inventory-related responsibilities with other operational tasks to ensure seamless business operations.', 0),
(16, 'San Antonio', 'Support Specialist ', 20000, 'Mid Level', 'Information Technology', 'Support specialists are responsible for reviewing and solving computer network and hardware problems for a business. They can work in a variety of industries to provide general support to a company\'s employees or at a technology or software-as-a-service (SaaS) company to provide technical support on user experience issues that require technical assistance.\r\n', 'Techy. Inc', 'Support specialists typically obtain a bachelor\'s degree in IT or computer science. Having a certificate or an associate degree paired with relevant professional experience may also be acceptable.\r\n', 0),
(17, 'San Roque', 'Business Manager', 20000, 'Mid Level', 'Business and Administration', 'Business managers oversee the day-to-day business operations of a company. They collaborate with company executives and employees to direct the organization\'s resources toward achieving goals and objectives. Business managers hire and train staff, work with management to design short-term and long-term plans and negotiate contracts. They also monitor the implementation and success of financial and sales strategies. There are opportunities for business managers in the banking industry, finance, manufacturing, government and others.\r\n', 'Let\'s Business', 'Since business managers often work across multiple departments, they need to have a good understanding of how every part of their company works. They also need a keen understanding of the industry they are working in, to position their company as a market leader. The role includes supervising and guiding staff to make sure they are doing their best work.\r\n', 0),
(18, 'San Vicente', 'Baker', 9000, 'Entry Level', 'Manufacturing and Logistics', 'Commercial bakers work in large manufacturing facilities, producing various baked goods such as pastries and cupcakes. Whereas bakers at small-scale bakeries put together ingredients to make pastries for their storefront, commercial bakers are required to use heavy machinery to mass-produce baked goods.\r\n', 'Sweetness Cafe', 'Bakers work long hours and require a lot of dedication and passion for their line of work. They should also have baking skills and the ability to work well as part of a team. Some bakers may attend a culinary school to develop their skills, but no formal education is required.\r\n', 0),
(19, 'San Miguel', 'Junior Web Developer', 7000, 'Entry Level', 'Information Technology', 'As a Junior Web Developer at TechWave Solutions, you will be responsible for developing and maintaining company websites. You will assist in coding, testing, and debugging web applications to ensure they are user-friendly, functional, and optimized for performance. Your duties will also include collaborating with other team members, gathering requirements, and implementing website features that align with business needs.\r\n', 'En-Codition', 'HTML: Proficient in HTML for building structured and semantic web content.\r\nCSS: Experienced with CSS to style and layout web pages, ensuring responsive design across different devices.\r\nJavaScript: Knowledgeable in JavaScript to create dynamic content and interactive web elements.\r\nCommunication: Strong communication skills for collaborating with team members and understanding client requirements.\r\n', 0),
(20, 'San Miguel', 'Administrative Assistant', 16000, 'Mid Level', 'Business and Administration', 'As an Administrative Assistant at OfficePro Services, you will be responsible for providing administrative support to ensure smooth office operations. Your tasks will include scheduling appointments, managing correspondence, maintaining office documentation, handling phone calls, and assisting with other daily office duties. You will be required to maintain a well-organized office environment, coordinate meetings, and ensure that office supplies are well-stocked.\r\n', 'RealitIPS', 'Skills:\r\n\r\nOrganization: Strong organizational skills to manage multiple tasks, schedules, and priorities.\r\nMS Office: Proficient in Microsoft Office Suite, including Word, Excel, and PowerPoint, for various office tasks.\r\nCommunication: Excellent written and verbal communication skills for interacting with team members and clients.\r\n', 0),
(21, 'San Roque', 'Senior Production Operator', 38000, 'Senior Level', 'Manufacturing and Logistics', 'As a Production Operator at BuildPro Manufacturing, you will operate machinery to ensure product quality and maintain a smooth production line. Your tasks will include monitoring machine performance, making necessary adjustments, performing routine inspections, and troubleshooting any production issues that arise. You will also be responsible for ensuring safety standards are followed while operating equipment, and collaborating with team members to meet production goals.\r\n', 'Maharlika Builders', 'Skills:\r\n\r\nAttention to Detail: Ability to carefully monitor machinery and products to maintain high quality standards.\r\nMachinery Operation: Proficient in operating production machinery and equipment safely and efficiently.\r\nTeamwork: Effective collaboration with team members to achieve production goals and resolve issues.', 0),
(22, 'San Pedro', 'Cloud Solutions Architect', 35000, 'Senior Level', 'Information Technology', 'As a Cloud Solutions Architect at TechPioneer Inc., you will design and implement cloud-based solutions for clients, ensuring that the infrastructure meets their business needs. You will work with teams to assess client requirements, develop cloud strategies, and oversee the deployment of solutions on cloud platforms like AWS, Azure, or Google Cloud. Your role also involves ensuring the security and scalability of cloud-based systems, as well as offering ongoing support and optimization.\r\n', 'PoppinsDev', 'Skills:\r\n\r\nCloud Platforms: Expertise in cloud platforms such as AWS, Azure, or Google Cloud for deploying scalable solutions.\r\nSystem Design: Advanced knowledge in system architecture and designing cloud solutions to optimize performance and cost-efficiency.\r\nSecurity: In-depth understanding of cloud security principles and best practices to ensure data protection and privacy.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE `letter` (
  `letterID` int(8) NOT NULL,
  `letterContent` varchar(2000) NOT NULL,
  `userID` int(8) NOT NULL,
  `isRead` tinyint(1) NOT NULL,
  `isAccepted` tinyint(1) NOT NULL,
  `isClick` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`letterID`, `letterContent`, `userID`, `isRead`, `isAccepted`, `isClick`) VALUES
(21, '', 50, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolioID` int(8) NOT NULL,
  `projectImage` varchar(300) NOT NULL,
  `projectTitle` varchar(300) NOT NULL,
  `userInfoID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolioID`, `projectImage`, `projectTitle`, `userInfoID`) VALUES
(20, '678e6bb01ab87_RZbrand.png', 'Logo', 20),
(21, '678e6bb01b5c3_STB Jobs_ Employee Login.png', 'STB Jobs', 20),
(23, '678e7111529da_Use Case.jpg', 'Use Case', 22),
(24, '678e711153405_STB Jobs_ Employee Login.png', 'STB jobs', 22),
(25, '678e795d0f8a8_STB Jobs_ Job Post Full Description.png', 'Sample Form', 23),
(26, '678e7b7dc4262_test.png', 'Poster', 24),
(27, '678f4b8e94a65_stbLogoAdmin.png', 'Logo', 26),
(33, '67938ff998959_orgLogo.png', 'VirtualHounds', 30),
(34, '67938ff999666_ERD.png', 'Business Planning', 30),
(35, '67939c35cbe7c_Find_Issue.png', 'Vet Checking', 31);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(8) NOT NULL,
  `datePosted` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `userID` int(8) NOT NULL,
  `jobDetailID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `datePosted`, `updatedAt`, `userID`, `jobDetailID`) VALUES
(11, '2025-01-24 13:32:05', '2025-01-24 13:35:15', 0, 12),
(12, '2025-01-24 13:33:50', '2025-01-24 13:33:50', 0, 13),
(14, '2025-01-24 16:39:23', '2025-01-24 16:39:50', 0, 15),
(15, '2025-01-24 20:07:41', '2025-01-24 20:07:41', 0, 16),
(16, '2025-01-24 20:49:26', '2025-01-24 20:49:26', 0, 17),
(17, '2025-01-24 20:50:08', '2025-01-24 20:50:08', 0, 18),
(18, '2025-01-24 20:52:12', '2025-01-24 20:52:12', 0, 19),
(19, '2025-01-24 20:53:13', '2025-01-24 20:53:24', 0, 20),
(20, '2025-01-24 20:54:44', '2025-01-24 20:54:44', 0, 21),
(21, '2025-01-24 20:55:27', '2025-01-24 20:55:27', 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(8) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(8) NOT NULL,
  `userInfoID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `username`, `email`, `password`, `role`, `userInfoID`) VALUES
(27, 'Mark', 'Ilawod', 'markWod', 'markWod@gmail.com', '1234', 'admin', 0),
(32, 'John   ', 'Stephen Galarrita', 'jsnotprom', 'jsnotprom@gmail.com', '1234', 'user', 20),
(34, 'Louis', 'Santos', 'wito11', 'wito11@gmail.com', '1234', 'user', 22),
(35, 'Joshua', 'Yazon', 'Jojo', 'jojo_ym@gmail.com', 'jojo123', 'user', 23),
(36, 'Rejoice  ', 'Rabino', 'reji', 'rejii@gmail.com', '12345', 'user', 24),
(38, 'Althea', 'Algaba', 'theaaa', 'theaaa@gmail.com', '1234', 'user', 26),
(43, 'Roland', 'Regio', 'rightontrack', 'regioroland@gmail.com', '1234', 'admin', 0),
(49, 'Bryan  ', 'Reaño', 'brycode', 'brycode@gmail.com', '1234', 'user', 30),
(50, 'Ayisha', 'Estoque', 'ayiSHA', 'ayiSHA@gmail.com', '1234', 'user', 31);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userInfoID` int(8) NOT NULL,
  `userProfileImage` varchar(300) NOT NULL,
  `userBio` varchar(300) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `userDescription` varchar(3000) NOT NULL,
  `contactDetails` varchar(3000) NOT NULL,
  `educationalDetails` varchar(3000) NOT NULL,
  `employmentHistoryDetails` varchar(3000) DEFAULT NULL,
  `certificationDetails` varchar(3000) DEFAULT NULL,
  `skillDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userInfoID`, `userProfileImage`, `userBio`, `jobTitle`, `userDescription`, `contactDetails`, `educationalDetails`, `employmentHistoryDetails`, `certificationDetails`, `skillDescription`) VALUES
(20, '678e6ad0277a6_stephen.png', 'UI/UX Designer with a passion for innovative and user-centered design solutions.', 'UI/UX Designer | Full Stack Developer', 'John Stephen Galarrita is a skilled UI/UX Designer and Full Stack Developer dedicated to delivering exceptional digital experiences. With a meticulous eye for detail and a strong understanding of user behavior, John specializes in creating visually appealing, functional, and user-friendly designs. Combining creativity with technical expertise, he ensures every project is a seamless blend of aesthetics and functionality. His mission is to make technology more intuitive and accessible for all.', 'Phone: 09764028537\r\nEmail: john.galarrita@example.com\r\nLinkedIn: linkedin.com/in/jsgalarrita', 'Undergraduate in BS Information Technology\r\nFocus: Web Development and User Experience Design', 'Freelance English as Second Language Tutor, Rarejob Inc. (2019–2021)\r\n\r\nConducted one-on-one English lessons with students, improving their language proficiency and communication skills.\r\nManaged lesson schedules effectively while maintaining student satisfaction.\r\nFreelance UI/UX Designer (2021–Present)\r\n\r\nDesigned and developed websites and mobile app interfaces for clients in diverse industries.\r\nCollaborated with developers and project managers to ensure smooth project execution.', 'UX Design Professional Certificate, Google Career Certificates\r\nFrontend Web Development Certification, freeCodeCamp\r\nGraphic Design Certification, Coursera', 'Proficient in:\r\nFrontend Development: HTML, CSS, JavaScript\r\nDesign Tools: Figma, Photoshop, Adobe XD\r\nWireframing and Prototyping\r\nResponsive Web Design\r\nUsability Testing'),
(22, '678e70beea2b9_wito.png', 'A dedicated professional with a Bachelor of Science in Business Administration (BSBA) degree from Ateneo de Manila University, I am passionate about driving business success through strategic planning and effective management practices. With a strong foundation in finance, marketing, and operations,', 'Business Development Manager | Corporate Strategist', 'As a Business Development Manager, I specialize in identifying growth opportunities, building strategic partnerships, and implementing solutions that increase revenue and operational efficiency. My expertise includes market research, financial analysis, and the development of long-term strategies to align with corporate goals. I am also skilled in team leadership and have successfully led cross-functional teams to achieve project milestones. Through my work, I prioritize creating sustainable business practices and fostering a culture of innovation and collaboration.', '+63 912 345 6789', 'I graduated with a Bachelor of Science in Business Administration (BSBA) degree from Ateneo de Manila University in 2018. My coursework focused on marketing, financial management, and organizational behavior. During my academic journey, I was an active member of the Ateneo Management Association, where I gained experience in event planning and corporate outreach. To enhance my knowledge, I pursued certifications in project management and business analytics, equipping me with valuable tools to tackle complex business challenges.', 'In 2019, I joined ABC Solutions Inc. as a Junior Business Analyst, where I supported strategic planning initiatives and conducted market trend analysis to guide executive decisions. I was promoted to Business Development Manager in 2021, a role in which I managed a portfolio of high-value clients, negotiated contracts, and developed strategies that led to a 20% increase in annual revenue. I have also collaborated with marketing and operations teams to optimize workflow and improve customer satisfaction. Additionally, I worked as a consultant for a startup accelerator program in 2023, mentoring entrepreneurs and helping them craft business strategies and secure funding.', 'I hold the following certifications:\r\n\r\nProject Management Professional (PMP), earned in 2020, which has enhanced my ability to lead complex projects efficiently.\r\nCertified Business Analysis Professional (CBAP), obtained in 2021, which refined my expertise in analyzing business needs and crafting effective solutions.\r\nDigital Marketing Specialization, completed via Coursera in 2022, which equipped me with advanced skills in social media marketing, SEO, and data-driven campaigns.\r\nAdditionally, I am a member of the Philippine Institute of Management (PIM), where I actively participate in networking events and professional development workshops.', 'I excel in business planning, market analysis, and financial forecasting. My analytical mindset allows me to identify areas for improvement and implement data-driven strategies to achieve measurable outcomes. I am proficient in using tools such as Microsoft Excel, Tableau, and CRM platforms to monitor performance metrics and optimize client relationships. Additionally, my leadership skills enable me to motivate teams and align them toward achieving organizational objectives. I am committed to co'),
(23, '678e79350401d_jojo.jpg', 'A logistics professional with a Bachelor’s degree in Supply Chain Management from De La Salle University, I am passionate about optimizing supply chain processes to ensure efficiency, cost-effectiveness, and timely delivery. With a strong background in transportation management, inventory control, a', 'Logistics Coordinator | Supply Chain Specialist', 'As a Logistics Coordinator, I oversee the end-to-end supply chain process, ensuring that goods move efficiently from origin to destination. My responsibilities include managing inventory, coordinating shipments, negotiating with suppliers and carriers, and maintaining compliance with local and international trade regulations. I specialize in creating cost-effective solutions to reduce delivery times and improve customer satisfaction. With expertise in warehouse management and route optimization, I have successfully implemented systems that minimized lead times and reduced costs. I am also committed to adopting eco-friendly logistics practices to align with corporate sustainability goals.', 'Email: logistics.janedoe@gmail.com\r\nPhone: +63 917 654 3210', 'I graduated with a Bachelor’s degree in Supply Chain Management from De La Salle University in 2019. My coursework covered logistics planning, inventory management, transportation systems, and procurement strategies. During my studies, I completed an internship with a multinational logistics company, where I gained valuable hands-on experience in coordinating shipments and tracking inventory. I have also attended specialized training sessions on freight forwarding and supply chain analytics to enhance my technical expertise in logistics operations.\r\n', 'Logistics Coordinator at XYZ Shipping Solutions (2020–Present):\r\nI oversee daily operations for domestic and international shipments, ensuring timely delivery and cost efficiency. My role involves coordinating with freight carriers, managing transportation schedules, and implementing strategies to minimize delays. I also developed a digital tracking system that improved real-time shipment monitoring and increased operational accuracy.\r\nSupply Chain Associate at Global Freight Logistics (2019–2020):\r\nI supported warehouse operations by managing inventory levels, ensuring compliance with safety regulations, and assisting in route planning for deliveries. I also contributed to the implementation of an automated inventory system that reduced stock discrepancies by 15%.', 'I hold the following certifications:\r\n\r\nCertified Supply Chain Professional (CSCP), earned in 2021, which provided me with advanced knowledge of supply chain management and operations.\r\nLean Six Sigma Green Belt, obtained in 2022, which equipped me with tools to improve operational efficiency and reduce waste.\r\nInternational Freight Forwarding Certification, completed in 2023, which enhanced my expertise in global logistics and trade compliance.\r\nI am an active member of the Philippine Institute for Supply Management (PISM), where I participate in seminars and workshops on emerging trends in logistics and supply chain management.', 'I am skilled in logistics planning, inventory control, and vendor management. My analytical mindset allows me to design efficient transportation routes and negotiate favorable contracts with carriers and suppliers. I am proficient in supply chain software such as SAP, Oracle Transportation Management, and warehouse management systems. My problem-solving abilities enable me to address logistical challenges promptly, ensuring smooth operations and high customer satisfaction. Additionally, I am ade'),
(24, '2025Jan24143534000000.jpg', 'Aspiring and enthusiastic graphic designer with a passion for creative visual storytelling.', 'Graphic Designer', 'Rejoice Rabino is a dedicated and creative graphic designer with a degree in Information Technology from the Polytechnic University of the Philippines (PUP). She is passionate about transforming ideas into visually compelling designs and is excited to embark on her professional journey in the design industry. Rejoice is eager to learn, adapt, and collaborate with like-minded professionals to create impactful visual content that resonates with audiences.', 'Email: rejoicerabino@gmail.com\r\nPhone: 09171234567 (if applicable)\r\nLinkedIn: linkedin.com/in/rejoicerabino', 'Bachelor of Information Technology, Polytechnic University of the Philippines (PUP)\r\nFocus: Graphic Design and Visual Media', 'First-Time Job as Graphic Designer (2023–Present)\r\nWorking as a graphic designer, creating visual assets for marketing campaigns, advertisements, and client projects.\r\nDeveloping design skills through real-world applications and collaboration with teams.', '', 'Proficient in:\r\nDesign Tools: Adobe Photoshop, Adobe Illustrator, Canva\r\nBranding and Logo Design\r\nPoster and Print Design\r\nTypography and Color Theory\r\nVisual Storytelling'),
(26, '678f4b507dc73_thea.jpg', 'A creative and detail-oriented Front-End Developer and Web Designer with a passion for crafting user-friendly and visually appealing websites. Recently graduated with a degree in Information Technology, I am eager to combine my technical expertise and design skills to enhance user experiences. My go', 'Front-End Developer | Web Designer', 'As a Front-End Developer and Web Designer, I specialize in creating visually stunning and functional websites that prioritize user experience. My work involves developing responsive layouts, implementing interactive elements, and ensuring cross-browser compatibility. I have expertise in translating design concepts into clean and efficient code using HTML, CSS, and JavaScript. Additionally, I collaborate closely with clients and back-end developers to deliver solutions that meet business objectives.\r\n\r\nI have a strong passion for design aesthetics and stay updated with the latest trends in web development and UI/UX design. My focus is on creating websites that not only look great but also provide seamless navigation and accessibility for all users.', 'Email: althea.algaba@gmail.com\r\nPhone: +63 912 345 6789', 'Graduated with a Bachelor of Science in Information Technology from Polytechnic University of the Philippines (PUP) in 2024. My coursework focused on web development, human-computer interaction, and software engineering. I also completed specialized training in front-end development, which covered modern frameworks, design principles, and responsive design techniques.', 'Junior Front-End Developer (Intern)\r\nTechnoWeb Solutions (2024)\r\n\r\nDesigned and implemented responsive user interfaces for client websites.\r\nCollaborated with a team of developers to enhance website performance and usability.\r\nConducted cross-browser and device testing to ensure compatibility and accessibility.\r\nFreelance Web Designer (2023-2024)\r\n\r\nDesigned and developed custom websites for small businesses, focusing on branding and user engagement.\r\nProvided graphic design services, including logo creation and social media assets.', 'Certified Front-End Developer from FreeCodeCamp (2024)\r\nResponsive Web Design Certification from Coursera (2023)\r\nAdobe Certified Professional in Graphic Design & Illustration Using Adobe Illustrator (2022)', 'Technical Skills:\r\n\r\nProficient in HTML5, CSS3, JavaScript (ES6+), and Bootstrap.\r\nExperience with front-end frameworks like React.js and Vue.js.\r\nSkilled in design tools such as Adobe XD, Figma, and Photoshop.\r\nKnowledge of version control systems (Git).\r\nFamiliar with SEO best practices and website optimization.\r\nSoft Skills:\r\n\r\nStrong problem-solving and critical-thinking skills.\r\nExcellent communication and teamwork abilities.\r\nAttention to detail and a keen eye for design aesthetics.\r\nSpeci'),
(30, '67938fcfa4823_bryan.jpg', 'Ambitious entrepreneur with a passion for business growth and innovative strategies.', 'Entrepreneur | Business Strategist | Consultant', 'Bryan Reano is a dynamic entrepreneur dedicated to transforming business ideas into successful ventures. With a deep understanding of market trends, financial planning, and leadership, he excels in creating innovative strategies for sustained business growth. Bryan\'s mission is to empower businesses to unlock their potential and achieve long-term success.', 'Email: bryan.reano@example.com | Phone: 09171234567 | LinkedIn: linkedin.com/in/bryanreano', 'Bachelor of Science in Business Administration, Major in Marketing, University of the Philippines', 'Business Consultant, Apex Strategies (2015–2018)\r\nProvided strategic advice to startups, helping them achieve scalable growth.\r\nConducted market research and developed actionable business plans for clients.', 'Certified Business Analyst Professional (CBAP)\r\nAdvanced Strategic Management Certificate, Harvard Business School Online\r\nCertified Financial Planner (CFP)', 'Strategic Planning\r\nFinancial Analysis and Budgeting\r\nMarket Research and Business Development\r\nLeadership and Team Management\r\nNegotiation and Networking'),
(31, '67939c1b807b3_ayisha.jpg', 'A recent graduate of the Doctor of Veterinary Medicine (DVM) program at the University of the Philippines Los Baños (UPLB), I am passionate about providing compassionate and comprehensive healthcare to animals. With a solid academic foundation and hands-on clinical experience, I am excited to begin ', 'Veterinarian | Animal Health Specialist\r\n', 'As a Veterinarian, I provide comprehensive medical care, including disease prevention, health assessments, surgeries, and emergency treatments for a variety of animals. My work includes diagnosing and managing common diseases in pets and farm animals, performing surgeries, and providing health consultations for pet owners. Additionally, I lead community outreach programs to raise awareness about animal health, such as rabies prevention and responsible pet ownership. I collaborate with a skilled team of veterinary assistants and technicians to deliver high-quality medical services in both private and rural animal clinics.', 'Email: ayishasofhia@gmail.com\r\nPhone: +63 999 8452 569', 'I graduated with a Doctor of Veterinary Medicine (DVM) degree from the University of the Philippines Los Baños (UPLB) in 2015. My academic journey focused on both small animal care and livestock health, which equipped me with a well-rounded expertise in the veterinary field. I have also pursued various professional development opportunities, attending specialized workshops on tropical animal diseases and veterinary surgery, ensuring I stay ahead of emerging trends in veterinary care in the Philippines.', 'During my academic journey, I completed a year-long internship at the UPLB Veterinary Teaching Hospital (2023-2024), where I gained practical experience in diagnosing and treating animals across various specialties, including surgery, emergency care, and preventive medicine. I worked alongside seasoned veterinarians and faculty, providing care for small animals and livestock while honing my skills in clinical decision-making and client communication. Additionally, I volunteered at Laguna Animal Rescue from 2022 to 2023, assisting with rescue operations, health assessments, and basic veterinary treatments for rescued animals, further strengthening my passion for animal welfare and community outreach.', 'I am a licensed Veterinarian in the Philippines, having passed the 2024 Veterinary Licensure Examination administered by the Professional Regulation Commission (PRC), with a certification number #123456. I am also a proud member of the Philippine Veterinary Medical Association (PVMA), where I actively engage in continuing education to stay updated on the latest veterinary practices. Additionally, I hold a certification in Basic Animal Emergency Care and first aid, which I obtained during my internship. This certification has strengthened my ability to respond effectively to emergency cases and provide immediate care when needed.', 'I am skilled in performing physical exams, diagnosing common diseases, and administering basic treatments and vaccinations. My clinical training has also provided me with experience in performing surgical procedures such as spaying, neutering, and wound care. I am passionate about promoting preventive care through education and counseling, helping pet owners understand the importance of regular health check-ups, nutrition, and disease prevention. Additionally, I have developed strong communicati');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicationform`
--
ALTER TABLE `applicationform`
  ADD PRIMARY KEY (`applicationFormID`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`helpID`);

--
-- Indexes for table `jobdetail`
--
ALTER TABLE `jobdetail`
  ADD PRIMARY KEY (`jobDetailID`);

--
-- Indexes for table `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`letterID`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolioID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userInfoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicationform`
--
ALTER TABLE `applicationform`
  MODIFY `applicationFormID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `helpID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobdetail`
--
ALTER TABLE `jobdetail`
  MODIFY `jobDetailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
  MODIFY `letterID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userInfoID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
