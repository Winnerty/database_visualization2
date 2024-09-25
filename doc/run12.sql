CREATE TABLE `users` (
                        `login` varchar(255) NOT NULL,
                        `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`login`, `password`) VALUES
         ('admin', 'epita2024');