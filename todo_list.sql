CREATE DATABASE IF NOT EXISTS `todo_list`; USE
`todo_list`;
CREATE TABLE IF NOT EXISTS `works`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(200) NOT NULL,
    `start_date` DATE NOT NULL,
    `end_date` DATE NOT NULL,
    `status` TINYINT(1) NOT NULL,
    `active` BOOLEAN NOT NULL DEFAULT 1,
    PRIMARY KEY(`id`)
    ) ENGINE = InnoDB AUTO_INCREMENT = 75 DEFAULT CHARSET = latin1; DELETE
                                                                    FROM
                                                                        `works`;
INSERT INTO `works`(
    `id`,
    `name`,
    `start_date`,
    `end_date`,
    `status`
)
VALUES(
          1,
          'Work Test 1',
          '2022-05-01',
          '2022-04-03',
          1
      ),(
          2,
          'Work Test 2',
          '2022-05-06',
          '2022-04-19',
          2
      )