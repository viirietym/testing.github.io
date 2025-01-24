-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 24, 2025 at 10:08 AM
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
(15, 'San Pedro', 'Warehouse Assistant Supervisor', 25001, 'Senior Level', 'Manufacturing and Logistics', 'Warehouse and Inventory Management:\r\nOverseeing warehouse operations involves managing inventory levels, tracking stock movements, and ensuring timely and accurate shipments. This role requires strong leadership skills to supervise warehouse staff, implement efficient storage and retrieval systems, and ensure compliance with safety and operational standards. Responsibilities also include monitoring inventory to prevent shortages or overstocking, maintaining accurate records, and using advanced inventory management systems to streamline operations.', 'LogisticMasters Corp.	', 'Knowledge of Inventory Management Systems and Multitasking:\r\nComprehensive understanding of inventory management systems, including tools and software used for tracking, ordering, and maintaining stock levels. Proven ability to multitask effectively, balancing inventory-related responsibilities with other operational tasks to ensure seamless business operations.', 0);

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
(19, '678e65434aca0_Screenshot 2024-11-13 235017.png', 'Parallax Website', 19),
(20, '678e6bb01ab87_RZbrand.png', 'Logo', 20),
(21, '678e6bb01b5c3_STB Jobs_ Employee Login.png', 'STB Jobs', 20),
(22, '678e6d894494e_ERD.png', 'Creation of ERD', 21),
(23, '678e7111529da_Use Case.jpg', 'Use Case', 22),
(24, '678e711153405_STB Jobs_ Employee Login.png', 'STB jobs', 22),
(25, '678e795d0f8a8_STB Jobs_ Job Post Full Description.png', 'Sample Form', 23),
(26, '678e7b7dc4262_test.png', 'Poster', 24),
(27, '678f4b8e94a65_stbLogoAdmin.png', 'Logo', 26),
(28, '679308e04d4b3_Admin.png', 'Flowchart Master', 27),
(29, '679308e04e244_class.png', 'Diagram', 27),
(30, '67932776e9d9a_Employee.png', 'Gumawa ng Flowchart', 28),
(31, '67932776eaaf6_STB Jobs_ Employee Login.png', 'Home', 28),
(32, '67932776ebbba_rej.jpg', 'Gumawa ng Profile', 28);

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
(14, '2025-01-24 16:39:23', '2025-01-24 16:39:50', 0, 15);

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
(31, 'Bryan', 'Reaño', 'brycode', 'brycode@gmail.com', '1234', 'user', 19),
(32, 'John  ', 'Stephen Galarrita', 'jsnotprom', 'jsnotprom@gmail.com', '1234', 'user', 20),
(34, 'Louis', 'Santos', 'wito11', 'wito11@gmail.com', '1234', 'user', 22),
(35, 'Joshua', 'Yazon', 'Jojo', 'jojo_ym@gmail.com', 'jojo123', 'user', 23),
(36, 'Rejoice', 'Rabino', 'reji', 'rejii@gmail.com', '12345', 'user', 24),
(38, 'Althea', 'Algaba', 'theaaa', 'theaaa@gmail.com', '1234', 'user', 26),
(43, 'Roland', 'Regio', 'rightontrack', 'regioroland@gmail.com', '1234', 'admin', 0),
(47, 'CJ', 'De', 'cjYup', 'cj@gmail.com', '1234', 'user', 28);

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
(20, '678e6ad0277a6_stephen.png', 'UI/UX Designer, passionate innovative design.', 'UI/UX Designer | Full Stack Developer', 'A passionate UI/UX Designer with a keen eye for detail and a deep love for creating user-centric digital experiences. I specialize in crafting intuitive and visually engaging designs that seamlessly blend functionality and aesthetics.', '09764028537', 'Undergraduate BS in Information Technology', 'Freelance English as Second Language Tutor at Rarejob Inc.', 'null', 'Proficient in HTML, CSS, javascript, Figma, and Photoshop'),
(22, '678e70beea2b9_wito.png', 'A dedicated professional with a Bachelor of Science in Business Administration (BSBA) degree from Ateneo de Manila University, I am passionate about driving business success through strategic planning and effective management practices. With a strong foundation in finance, marketing, and operations,', 'Business Development Manager | Corporate Strategist', 'As a Business Development Manager, I specialize in identifying growth opportunities, building strategic partnerships, and implementing solutions that increase revenue and operational efficiency. My expertise includes market research, financial analysis, and the development of long-term strategies to align with corporate goals. I am also skilled in team leadership and have successfully led cross-functional teams to achieve project milestones. Through my work, I prioritize creating sustainable business practices and fostering a culture of innovation and collaboration.', '+63 912 345 6789', 'I graduated with a Bachelor of Science in Business Administration (BSBA) degree from Ateneo de Manila University in 2018. My coursework focused on marketing, financial management, and organizational behavior. During my academic journey, I was an active member of the Ateneo Management Association, where I gained experience in event planning and corporate outreach. To enhance my knowledge, I pursued certifications in project management and business analytics, equipping me with valuable tools to tackle complex business challenges.', 'In 2019, I joined ABC Solutions Inc. as a Junior Business Analyst, where I supported strategic planning initiatives and conducted market trend analysis to guide executive decisions. I was promoted to Business Development Manager in 2021, a role in which I managed a portfolio of high-value clients, negotiated contracts, and developed strategies that led to a 20% increase in annual revenue. I have also collaborated with marketing and operations teams to optimize workflow and improve customer satisfaction. Additionally, I worked as a consultant for a startup accelerator program in 2023, mentoring entrepreneurs and helping them craft business strategies and secure funding.', 'I hold the following certifications:\r\n\r\nProject Management Professional (PMP), earned in 2020, which has enhanced my ability to lead complex projects efficiently.\r\nCertified Business Analysis Professional (CBAP), obtained in 2021, which refined my expertise in analyzing business needs and crafting effective solutions.\r\nDigital Marketing Specialization, completed via Coursera in 2022, which equipped me with advanced skills in social media marketing, SEO, and data-driven campaigns.\r\nAdditionally, I am a member of the Philippine Institute of Management (PIM), where I actively participate in networking events and professional development workshops.', 'I excel in business planning, market analysis, and financial forecasting. My analytical mindset allows me to identify areas for improvement and implement data-driven strategies to achieve measurable outcomes. I am proficient in using tools such as Microsoft Excel, Tableau, and CRM platforms to monitor performance metrics and optimize client relationships. Additionally, my leadership skills enable me to motivate teams and align them toward achieving organizational objectives. I am committed to co'),
(23, '678e79350401d_jojo.jpg', 'A logistics professional with a Bachelor’s degree in Supply Chain Management from De La Salle University, I am passionate about optimizing supply chain processes to ensure efficiency, cost-effectiveness, and timely delivery. With a strong background in transportation management, inventory control, a', 'Logistics Coordinator | Supply Chain Specialist', 'As a Logistics Coordinator, I oversee the end-to-end supply chain process, ensuring that goods move efficiently from origin to destination. My responsibilities include managing inventory, coordinating shipments, negotiating with suppliers and carriers, and maintaining compliance with local and international trade regulations. I specialize in creating cost-effective solutions to reduce delivery times and improve customer satisfaction. With expertise in warehouse management and route optimization, I have successfully implemented systems that minimized lead times and reduced costs. I am also committed to adopting eco-friendly logistics practices to align with corporate sustainability goals.', 'Email: logistics.janedoe@gmail.com\r\nPhone: +63 917 654 3210', 'I graduated with a Bachelor’s degree in Supply Chain Management from De La Salle University in 2019. My coursework covered logistics planning, inventory management, transportation systems, and procurement strategies. During my studies, I completed an internship with a multinational logistics company, where I gained valuable hands-on experience in coordinating shipments and tracking inventory. I have also attended specialized training sessions on freight forwarding and supply chain analytics to enhance my technical expertise in logistics operations.\r\n', 'Logistics Coordinator at XYZ Shipping Solutions (2020–Present):\r\nI oversee daily operations for domestic and international shipments, ensuring timely delivery and cost efficiency. My role involves coordinating with freight carriers, managing transportation schedules, and implementing strategies to minimize delays. I also developed a digital tracking system that improved real-time shipment monitoring and increased operational accuracy.\r\nSupply Chain Associate at Global Freight Logistics (2019–2020):\r\nI supported warehouse operations by managing inventory levels, ensuring compliance with safety regulations, and assisting in route planning for deliveries. I also contributed to the implementation of an automated inventory system that reduced stock discrepancies by 15%.', 'I hold the following certifications:\r\n\r\nCertified Supply Chain Professional (CSCP), earned in 2021, which provided me with advanced knowledge of supply chain management and operations.\r\nLean Six Sigma Green Belt, obtained in 2022, which equipped me with tools to improve operational efficiency and reduce waste.\r\nInternational Freight Forwarding Certification, completed in 2023, which enhanced my expertise in global logistics and trade compliance.\r\nI am an active member of the Philippine Institute for Supply Management (PISM), where I participate in seminars and workshops on emerging trends in logistics and supply chain management.', 'I am skilled in logistics planning, inventory control, and vendor management. My analytical mindset allows me to design efficient transportation routes and negotiate favorable contracts with carriers and suppliers. I am proficient in supply chain software such as SAP, Oracle Transportation Management, and warehouse management systems. My problem-solving abilities enable me to address logistical challenges promptly, ensuring smooth operations and high customer satisfaction. Additionally, I am ade'),
(24, '2025Jan24073518000000.png', 'Graphic Designer Enthusiast', 'Graphic Designer', 'A graphic designer who graduated with a Bachelor of Information Technology from PUP and is working for the first time.', 'rejoicerabino@gmail.com', 'Bachelor of Information Technology, PUP.', 'First-time job as a graphic designer.', 'Adobe Certified Expert (ACE) in Photoshop', 'Graphic Designer Skills'),
(26, '678f4b507dc73_thea.jpg', 'A creative and detail-oriented Front-End Developer and Web Designer with a passion for crafting user-friendly and visually appealing websites. Recently graduated with a degree in Information Technology, I am eager to combine my technical expertise and design skills to enhance user experiences. My go', 'Front-End Developer | Web Designer', 'As a Front-End Developer and Web Designer, I specialize in creating visually stunning and functional websites that prioritize user experience. My work involves developing responsive layouts, implementing interactive elements, and ensuring cross-browser compatibility. I have expertise in translating design concepts into clean and efficient code using HTML, CSS, and JavaScript. Additionally, I collaborate closely with clients and back-end developers to deliver solutions that meet business objectives.\r\n\r\nI have a strong passion for design aesthetics and stay updated with the latest trends in web development and UI/UX design. My focus is on creating websites that not only look great but also provide seamless navigation and accessibility for all users.', 'Email: althea.algaba@gmail.com\r\nPhone: +63 912 345 6789', 'Graduated with a Bachelor of Science in Information Technology from Polytechnic University of the Philippines (PUP) in 2024. My coursework focused on web development, human-computer interaction, and software engineering. I also completed specialized training in front-end development, which covered modern frameworks, design principles, and responsive design techniques.', 'Junior Front-End Developer (Intern)\r\nTechnoWeb Solutions (2024)\r\n\r\nDesigned and implemented responsive user interfaces for client websites.\r\nCollaborated with a team of developers to enhance website performance and usability.\r\nConducted cross-browser and device testing to ensure compatibility and accessibility.\r\nFreelance Web Designer (2023-2024)\r\n\r\nDesigned and developed custom websites for small businesses, focusing on branding and user engagement.\r\nProvided graphic design services, including logo creation and social media assets.', 'Certified Front-End Developer from FreeCodeCamp (2024)\r\nResponsive Web Design Certification from Coursera (2023)\r\nAdobe Certified Professional in Graphic Design & Illustration Using Adobe Illustrator (2022)', 'Technical Skills:\r\n\r\nProficient in HTML5, CSS3, JavaScript (ES6+), and Bootstrap.\r\nExperience with front-end frameworks like React.js and Vue.js.\r\nSkilled in design tools such as Adobe XD, Figma, and Photoshop.\r\nKnowledge of version control systems (Git).\r\nFamiliar with SEO best practices and website optimization.\r\nSoft Skills:\r\n\r\nStrong problem-solving and critical-thinking skills.\r\nExcellent communication and teamwork abilities.\r\nAttention to detail and a keen eye for design aesthetics.\r\nSpeci');

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
  MODIFY `applicationFormID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `helpID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobdetail`
--
ALTER TABLE `jobdetail`
  MODIFY `jobDetailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
  MODIFY `letterID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userInfoID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
