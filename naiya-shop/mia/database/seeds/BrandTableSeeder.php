<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brand')->delete();
        
        \DB::table('brand')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cid' => 268,
                'name' => '德国原装Hipp',
                'desc' => '&lt;p&gt;德国婴幼儿食品第一品牌，全球最大的有机食品生产商，几乎每个德国小朋友都是吃着喜宝的产品长大的。经欧盟认证，100%纯天然及有机的保证，单纯保留食材最原始的味道，口感自然味道极佳，让宝宝摄取最天然的营养而不会造成肠胃道的负担，绝无任何人工添加香料、色素及化学成份的营养素。&lt;/p&gt;',
                'img' => '20160629/1467166706842685.jpg',
                'status' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'cid' => 266,
                'name' => '德国原装Aptamil',
            'desc' => '&lt;p&gt;德国爱他美Aptamil针对有蛋白质过敏的宝宝，可以降低50%的蛋白质过敏的可能性。为新生儿带来母乳专利Aptamil包含牛奶。蛋白质。脂肪和矿物制提炼的近乎母乳的奶粉高质量的兼容乳糖(乳糖)及母乳所包含的营养。作为新生儿专属食物完全自然地哺乳您的婴孩提高免疫系统。&lt;/p&gt;',
                'img' => '20160629/1467180133580034.jpg',
                'status' => 2,
            ),
            2 => 
            array (
                'id' => 7,
                'cid' => 270,
                'name' => '荷兰原装Nutrilon',
                'desc' => '&lt;p&gt;具有百年历史的荷兰牛栏奶粉，是荷兰市场领先的婴幼儿奶粉品牌，来自欧洲黄金奶源地带自家牧场，纯天然牧养模式，视奶牛如家人，牛奶更纯净，欧盟的品质值得信赖。&lt;/p&gt;',
                'img' => '20160629/1467179907113561.jpg',
                'status' => 2,
            ),
            3 => 
            array (
                'id' => 8,
                'cid' => 269,
                'name' => ' 德国Topfer',
                'desc' => '&lt;p&gt;特福芬公司位于风景如画的阿尔卑斯山脚下，是德国最早从事婴儿食品研究生产的企业之一；1989年，特福芬公司研制出婴儿有机奶粉，成为欧洲最早生产有机奶粉企业之一。凭借近百年的研发制造经验和技术专利，是德国母婴领域当之无愧的旗舰。&lt;/p&gt;',
                'img' => '20160629/1467180416779655.png',
                'status' => 1,
            ),
            4 => 
            array (
                'id' => 9,
                'cid' => 271,
                'name' => '荷兰Herobaby',
                'desc' => '&lt;p&gt;Hero 
baby，是荷兰皇家乳业旗下百年奶粉品牌。美素的奶源和一般的乳业集团不同，荷兰皇家乳业是合作型乳企，由欧洲超过20,000名左右会员农场主联合经营，共同管理，所以它的奶源不是工业化的采购，而是完全从源头来把控。而且口味清淡，不上火不热气，在妈妈群中拥有不错的口碑。&lt;/p&gt;',
                'img' => '20160629/1467180631986741.jpg',
                'status' => 2,
            ),
            5 => 
            array (
                'id' => 10,
                'cid' => 275,
                'name' => '英国Cow&Gate',
                'desc' => '&lt;p&gt;Cow&amp;amp;Gate是创立于1904年的英国著名奶粉品牌，Cow&amp;amp;Gate有着近100年的悠久历史和经验为宝宝成长提供有全面营养又安全的婴儿奶粉。为确保最好的质量，Cow&amp;amp;Gate的所有产品都不假手于他人，都是自己专门畜养，种植、生产加工成品。精确检验每一个生产阶段以确保产品达到最高的水准。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467180745183862.png',
                'status' => 1,
            ),
            6 => 
            array (
                'id' => 11,
                'cid' => 277,
                'name' => '德国holle',
                'desc' => '&lt;p&gt;1933年创建于瑞士的Holle有机婴儿食品公司,是全球天然有机生物食品生产商的先驱。Holle婴儿配方奶粉和谷物产品系列等均在德国生产。始终坚持把世界上最好的有机食品奉献每一位成长宝宝的品质理念，充分重视人体健康、动物健康和自然环境，最天然的方式帮助宝宝茁壮成长。&lt;/p&gt;',
                'img' => '20160629/1467180922509940.png',
                'status' => 1,
            ),
            7 => 
            array (
                'id' => 12,
                'cid' => 278,
                'name' => '英国Aptamil',
                'desc' => '&lt;p&gt;爱他美（Aptamil）奶粉是德国第一品牌的奶粉，也是欧洲销量最好的奶粉之一。含与母乳成分相同的DHA的营养，极易吸收，特有免疫系统，用最自然方式保证宝宝的健康需要，口味较淡，含专利的益生元，给宝宝需要的健康肠菌丛，它能以自然方式增强宝宝免疫系统。&lt;/p&gt;',
                'img' => '20160630/1467289203745736.png',
                'status' => 1,
            ),
            8 => 
            array (
                'id' => 13,
                'cid' => 279,
                'name' => ' 授权行货惠氏启赋',
                'desc' => '&lt;p&gt;惠氏是全球500强企业之一，在婴幼儿营养品领域有着近百年历史。在很多国家，惠氏产品都受到医护人员、营养专家和消费者的高度赞誉。优质奶源，安全可靠无污染。惠氏奶粉从选料的源头把控产品质量，给予妈妈和宝宝以安心安全的健康保障。&lt;/p&gt;',
                'img' => '20160629/1467181348416790.png',
                'status' => 1,
            ),
            9 => 
            array (
                'id' => 14,
                'cid' => 280,
                'name' => '港版美赞臣',
                'desc' => '&lt;p&gt;美赞臣公司创立于1905年，至今已有百年历史，是世界上生产营养品的大型跨国企业之一，堪称世界营养权威。美赞臣公司在全球拥有7个生产基地，营养产品行销50多个国家和地区，所经营的婴幼儿奶粉是全球市场的领导品牌，受到了千百万医学专家和母亲的信任。&lt;/p&gt;',
                'img' => '20160629/1467182055729084.png',
                'status' => 1,
            ),
            10 => 
            array (
                'id' => 15,
                'cid' => 281,
                'name' => '授权行货爱他美',
            'desc' => '&lt;p&gt;德国爱他美Aptamil针对有蛋白质过敏的宝宝，可以降低50%的蛋白质过敏的可能性。为新生儿带来母乳专利Aptamil包含牛奶。蛋白质。脂肪和矿物制提炼的近乎母乳的奶粉高质量的兼容乳糖(乳糖)及母乳所包含的营养。作为新生儿专属食物完全自然地哺乳您的婴孩提高免疫系统。&lt;/p&gt;',
                'img' => '20160705/1467704872997505.jpg',
                'status' => 2,
            ),
            11 => 
            array (
                'id' => 16,
                'cid' => 282,
                'name' => '授权行货诺优能',
                'desc' => '&lt;p&gt;诺优能来自欧洲乳品大国荷兰，选择自然的生态环境好奶源，生产技术严格遵循欧洲食品安全体系生产，全面实行HACCP食品安全控制体系，奶粉里面蕴含FOS/GOS益生元专利组合，能促进肠道益生菌生长及抑制害菌数量，帮助增强抵抗力，还有利于大脑和视力发育的DHA，配方科学营养，为宝宝每个成长阶段提供均衡营养支持。&lt;/p&gt;',
                'img' => '20160629/1467182422953355.png',
                'status' => 1,
            ),
            12 => 
            array (
                'id' => 17,
                'cid' => 284,
                'name' => '美国MeadJohnson',
                'desc' => '&lt;p&gt;美国美赞臣公司创立于1905年，至今已有百年历史，是世界上生产营养品的大型跨国企业之一，堪称世界营养权威。美赞臣公司在全球拥有7个生产基地，营养产品行销50多个国家和地区，所经营的婴幼儿奶粉是全球市场的领导品牌，受到了千百万医学专家和母亲的信任。&lt;/p&gt;',
                'img' => '20160629/1467182514370602.png',
                'status' => 1,
            ),
            13 => 
            array (
                'id' => 18,
                'cid' => 272,
                'name' => '尤妮佳',
                'desc' => '&lt;p&gt;&lt;span class=&quot;name&quot;&gt;尤妮佳 moony&lt;/span&gt;&lt;/p&gt;',
                'img' => '20160629/1467186082604821.jpg',
                'status' => 2,
            ),
            14 => 
            array (
                'id' => 19,
                'cid' => 273,
                'name' => ' 花王',
                'desc' => '&lt;p&gt;&lt;span class=&quot;name&quot;&gt;花王 Merries&lt;/span&gt;&lt;/p&gt;',
                'img' => '20160629/1467186021175948.jpg',
                'status' => 2,
            ),
            15 => 
            array (
                'id' => 20,
                'cid' => 274,
                'name' => 'GOON大王天使',
                'desc' => '&lt;p&gt;&lt;span class=&quot;name&quot;&gt;大王 GOO.N&lt;/span&gt;&lt;/p&gt;',
                'img' => '20160629/1467186334377570.png',
                'status' => 1,
            ),
            16 => 
            array (
                'id' => 21,
                'cid' => 286,
                'name' => 'Pampers帮宝适',
                'desc' => '&lt;p&gt;帮宝适，美国宝洁公司著名婴儿卫生系列产品。柔软舒适的魔术腰贴，能把宝宝柔软地怀抱在如棉质般的柔嫩里。多层吸收体，将能有效吸收尿液，帮助小屁屁保持干爽。是各国父母首选的婴儿护理用品之一。&lt;/p&gt;',
                'img' => '20160629/1467186408706447.png',
                'status' => 2,
            ),
            17 => 
            array (
                'id' => 22,
                'cid' => 287,
                'name' => 'Singapore Huggies新加坡好奇',
                'desc' => '&lt;p&gt;好奇HUGGIES纸尿裤诞生于1978年，于22个国际及地区市场领先，全球约有四分之一的宝宝在使用好奇纸尿裤。好奇致力于为宝宝提供最舒适和贴体的纸尿裤穿着体验，让宝宝在他的世界无拘无束的自由探索、发现、快乐地成长。&lt;/p&gt;',
                'img' => '20160629/1467182971635074.png',
                'status' => 1,
            ),
            18 => 
            array (
                'id' => 23,
                'cid' => 288,
                'name' => 'Pampers care帮宝适棉柔',
                'desc' => '&lt;p&gt;帮宝适，美国宝洁公司著名婴儿卫生系列产品。柔软舒适的魔术腰贴，能把宝宝柔软地怀抱在如棉质般的柔嫩里。多层吸收体，将能有效吸收尿液，帮助小屁屁保持干爽。是各国父母首选的婴儿护理用品之一。&lt;/p&gt;',
                'img' => '20160706/1467774735676510.png',
                'status' => 1,
            ),
            19 => 
            array (
                'id' => 24,
                'cid' => 289,
                'name' => 'Huggies Gold好奇金装',
                'desc' => '&lt;p&gt;好奇HUGGIES纸尿裤诞生于1978年，于22个国际及地区市场领先，全球约有四分之一的宝宝在使用好奇纸尿裤。好奇致力于为宝宝提供最舒适和贴体的纸尿裤穿着体验，让宝宝在他的世界无拘无束的自由探索、发现、快乐地成长。&lt;/p&gt;',
                'img' => '20160706/1467774891919472.png',
                'status' => 1,
            ),
            20 => 
            array (
                'id' => 25,
                'cid' => 290,
                'name' => 'Huggies platinum好奇铂金装',
                'desc' => '&lt;p&gt;好奇HUGGIES纸尿裤诞生于1978年，于22个国际及地区市场领先，全球约有四分之一的宝宝在使用好奇纸尿裤。好奇致力于为宝宝提供最舒适和贴体的纸尿裤穿着体验，让宝宝在他的世界无拘无束的自由探索、发现、快乐地成长。&lt;/p&gt;',
                'img' => '20160706/1467775132673759.png',
                'status' => 1,
            ),
            21 => 
            array (
                'id' => 26,
                'cid' => 291,
                'name' => 'Mamypoko 妈咪宝贝',
                'desc' => '&lt;p&gt;&lt;span class=&quot;name&quot;&gt;妈咪宝贝 MamyPoko&lt;/span&gt;&lt;/p&gt;',
                'img' => '20160629/1467184326241830.jpg',
                'status' => 2,
            ),
            22 => 
            array (
                'id' => 27,
                'cid' => 292,
                'name' => 'Libero丽贝乐',
                'desc' => '&lt;p&gt;Libero丽贝乐，欧洲原装进口，北欧婴儿纸尿裤销量第一，全网性价比最高的纸尿裤。瞬吸、渗透性好，柔软透气，一晚只需一片，用丽贝乐，宝宝舒心，妈妈放心。&lt;/p&gt;',
                'img' => '20160629/1467183205712826.png',
                'status' => 1,
            ),
            23 => 
            array (
                'id' => 28,
                'cid' => 293,
                'name' => 'Bella Baby Happy贝拉宝贝',
                'desc' => '&lt;p&gt;贝拉宝贝（Bella
Baby Happy）为波兰TZMO 
SA集团旗下品牌，至今已有20余年历史。欧洲一线品牌，该品牌专门为不同生长阶段的婴幼儿生产纸尿裤轻薄,干爽,透气,棉柔,超强吸水,抗菌该品牌在欧洲、亚洲多个国家享有极好的口碑，是消费者信赖的欧洲原装产品。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467183295675514.png',
                'status' => 1,
            ),
            24 => 
            array (
                'id' => 29,
                'cid' => 294,
                'name' => 'BioFities爱婴舒坦',
                'desc' => '&lt;p&gt;BioFities纸尿裤是由德国赫曼公司于1976年研制开发成功并率先投入德国市场的产品。第一条纸尿裤名叫： Strampelpeter 
Fix中文译作“舞动的彼得菲克斯&amp;quot; 在注重高品质的德国，曾经获得66%市场占有率，在70、80、90年代销量居于德国首位。2007年, 
FIXIES GROUP 
LTD公司全面并购了德国的纸品公司与纸品工厂。2013年,为了BioFities的品质全面提升，故在美国投资新建一处厂区，生产绿色环保的天使系列。BIOFITIES作为FIXIES旗下最受欢迎的产品之一，是欧美天然生态纸尿裤的领先品牌！&lt;/p&gt;',
                'img' => '20160629/1467183373604750.png',
                'status' => 1,
            ),
            25 => 
            array (
                'id' => 30,
                'cid' => 295,
                'name' => 'BAMBO班博',
                'desc' => '&lt;p&gt;BAMBO

被推崇为最顶级的婴儿纸尿裤，纯净、天然、安全、健康。所有材质均经过最严格的工艺筛选及检测，不含有重金属及含氮的颜料，天然棉微粒气孔内层与可呼吸外层形成最佳的透气品质，整晚使用也不会产生刺鼻的气味，使宝宝的肌肤干爽舒适。用BAMBO纸尿裤，给宝宝最好的。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467183420636483.jpg',
                'status' => 1,
            ),
            26 => 
            array (
                'id' => 31,
                'cid' => 10,
                'name' => '新西兰原装 a2',
                'desc' => '&lt;p&gt;A2有限公司是一家迅速成长的乳制品公司， 旗下A2牛奶目前遍及新西兰、澳大利亚、英国及中国。A2 品牌牛奶是鲜奶产品，源自含有纯A2型β-酪蛋白的奶牛。所有的A2牛奶都是通过DNA测试验证，并通过认证以确保产出的牛奶只含有A2型的β-酪蛋白。&lt;/p&gt;',
                'img' => '20160629/1467188563638964.jpg',
                'status' => 2,
            ),
            27 => 
            array (
                'id' => 32,
                'cid' => 10,
                'name' => '雀氏 Chiaus',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467186509684936.jpg',
                'status' => 1,
            ),
            28 => 
            array (
                'id' => 33,
                'cid' => 10,
                'name' => '美国原装MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467187928437446.jpg',
                'status' => 1,
            ),
            29 => 
            array (
                'id' => 34,
                'cid' => 10,
                'name' => 'Humana',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467188708167681.jpg',
                'status' => 1,
            ),
            30 => 
            array (
                'id' => 35,
                'cid' => 10,
                'name' => '惠氏SMA英国版',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467188746623189.png',
                'status' => 1,
            ),
            31 => 
            array (
                'id' => 36,
                'cid' => 10,
                'name' => '荷兰原装Friso',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467188785152293.png',
                'status' => 1,
            ),
            32 => 
            array (
                'id' => 37,
                'cid' => 10,
                'name' => '雅培',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467188802703100.jpg',
                'status' => 1,
            ),
            33 => 
            array (
                'id' => 38,
                'cid' => 10,
                'name' => '惠氏',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467188861271879.jpg',
                'status' => 1,
            ),
            34 => 
            array (
                'id' => 39,
                'cid' => 10,
                'name' => '爱思贝Earth\'s Best',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467188901660669.png',
                'status' => 1,
            ),
            35 => 
            array (
                'id' => 40,
                'cid' => 10,
                'name' => 'Arla',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467188948594008.jpg',
                'status' => 1,
            ),
            36 => 
            array (
                'id' => 41,
                'cid' => 10,
                'name' => '雅士利',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467188965257372.jpg',
                'status' => 1,
            ),
            37 => 
            array (
                'id' => 42,
                'cid' => 10,
                'name' => '多美滋Dumex',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467188992354813.jpg',
                'status' => 1,
            ),
            38 => 
            array (
                'id' => 43,
                'cid' => 10,
                'name' => '美素佳儿Friso',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467189067662759.jpg',
                'status' => 1,
            ),
            39 => 
            array (
                'id' => 44,
                'cid' => 10,
                'name' => '雀巢',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467189180497234.jpg',
                'status' => 1,
            ),
            40 => 
            array (
                'id' => 45,
                'cid' => 10,
                'name' => '授权行货雅培',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467189316154177.jpg',
                'status' => 1,
            ),
            41 => 
            array (
                'id' => 46,
                'cid' => 10,
                'name' => '合生元',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467189349621239.jpg',
                'status' => 1,
            ),
            42 => 
            array (
                'id' => 47,
                'cid' => 10,
                'name' => '惠氏S-26',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467189398459776.jpg',
                'status' => 1,
            ),
            43 => 
            array (
                'id' => 48,
                'cid' => 10,
                'name' => '澳佳宝',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467189427749259.jpg',
                'status' => 1,
            ),
            44 => 
            array (
                'id' => 49,
                'cid' => 10,
                'name' => '澳洲原装',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467189451568109.jpg',
                'status' => 1,
            ),
            45 => 
            array (
                'id' => 50,
                'cid' => 10,
                'name' => '澳洲原装BELLAMY\'S',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467189485407976.jpg',
                'status' => 1,
            ),
            46 => 
            array (
                'id' => 51,
                'cid' => 10,
                'name' => '荷仕籣',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => '20160629/1467189529553410.png',
                'status' => 1,
            ),
            47 => 
            array (
                'id' => 52,
                'cid' => 29,
                'name' => '德国原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            48 => 
            array (
                'id' => 53,
                'cid' => 29,
                'name' => '德国原装 HiPP',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            49 => 
            array (
                'id' => 54,
                'cid' => 29,
                'name' => '德国原装 Topfer',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            50 => 
            array (
                'id' => 55,
                'cid' => 30,
                'name' => '德国原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            51 => 
            array (
                'id' => 56,
                'cid' => 30,
                'name' => '澳洲原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            52 => 
            array (
                'id' => 57,
                'cid' => 30,
                'name' => '德国原装 HiPP',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            53 => 
            array (
                'id' => 58,
                'cid' => 30,
                'name' => '英国原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            54 => 
            array (
                'id' => 59,
                'cid' => 30,
                'name' => '英国原装 Cow&Gate',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            55 => 
            array (
                'id' => 60,
                'cid' => 30,
                'name' => '新西兰原装 a2',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            56 => 
            array (
                'id' => 61,
                'cid' => 30,
                'name' => '荷兰原装 Hero Baby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            57 => 
            array (
                'id' => 62,
                'cid' => 30,
                'name' => '荷兰原装 Nutrilon',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            58 => 
            array (
                'id' => 63,
                'cid' => 30,
                'name' => '德国原装 Topfer',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            59 => 
            array (
                'id' => 64,
                'cid' => 30,
                'name' => '澳洲原装 BELLAMY\'S',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            60 => 
            array (
                'id' => 65,
                'cid' => 30,
                'name' => '港版原装 美赞臣 MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            61 => 
            array (
                'id' => 66,
                'cid' => 30,
                'name' => '德国原装 Holle',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            62 => 
            array (
                'id' => 67,
                'cid' => 30,
                'name' => '雅培 Abbott',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            63 => 
            array (
                'id' => 68,
                'cid' => 30,
                'name' => '荷兰原装 Friso',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            64 => 
            array (
                'id' => 69,
                'cid' => 30,
                'name' => '诺优能 Nutrilon',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            65 => 
            array (
                'id' => 70,
                'cid' => 30,
                'name' => '美素佳儿 Friso',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            66 => 
            array (
                'id' => 71,
                'cid' => 30,
                'name' => '惠氏 Wyeth 港版启赋',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            67 => 
            array (
                'id' => 72,
                'cid' => 30,
                'name' => '惠氏 Wyeth 启赋',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            68 => 
            array (
                'id' => 73,
                'cid' => 30,
                'name' => '爱他美 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            69 => 
            array (
                'id' => 74,
                'cid' => 30,
                'name' => '美国原装 美赞臣 MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            70 => 
            array (
                'id' => 75,
                'cid' => 30,
                'name' => '惠氏 Wyeth SMA 英国版',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            71 => 
            array (
                'id' => 76,
                'cid' => 30,
                'name' => '惠氏 Wyeth',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            72 => 
            array (
                'id' => 77,
                'cid' => 30,
                'name' => '授权行货 喜宝',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            73 => 
            array (
                'id' => 78,
                'cid' => 30,
                'name' => '美赞臣 MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            74 => 
            array (
                'id' => 79,
                'cid' => 30,
                'name' => '雀巢 Nestle',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            75 => 
            array (
                'id' => 80,
                'cid' => 30,
                'name' => '授权行货 特福芬 Topfer',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            76 => 
            array (
                'id' => 81,
                'cid' => 30,
                'name' => '澳洲原装 爱他美金装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            77 => 
            array (
                'id' => 82,
                'cid' => 30,
                'name' => '新西兰原装 Karicare',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            78 => 
            array (
                'id' => 83,
                'cid' => 30,
                'name' => '澳洲原装 惠氏S26 Wyeth',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            79 => 
            array (
                'id' => 84,
                'cid' => 30,
                'name' => 'Humana',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            80 => 
            array (
                'id' => 85,
                'cid' => 30,
                'name' => '明治 meiji',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            81 => 
            array (
                'id' => 86,
                'cid' => 30,
                'name' => '合生元 BIOETIME',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            82 => 
            array (
                'id' => 87,
                'cid' => 30,
                'name' => 'a2',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            83 => 
            array (
                'id' => 88,
                'cid' => 30,
                'name' => '日本原装 固力果 ICREO',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            84 => 
            array (
                'id' => 89,
                'cid' => 30,
                'name' => '澳洲爱他美Aptamil白金版 Aptamil Profutura',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            85 => 
            array (
                'id' => 90,
                'cid' => 30,
                'name' => '澳洲原装惠氏 S26系列 Wyeth S26',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            86 => 
            array (
                'id' => 91,
                'cid' => 30,
                'name' => '多美滋 Dumex',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            87 => 
            array (
                'id' => 92,
                'cid' => 30,
                'name' => '咔哇熊 Cowala',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            88 => 
            array (
                'id' => 93,
                'cid' => 30,
                'name' => 'EARTH\'S BEST',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            89 => 
            array (
                'id' => 94,
                'cid' => 30,
                'name' => '森永 MORINAGA',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            90 => 
            array (
                'id' => 95,
                'cid' => 30,
                'name' => '澳洲原装博宝 bubs',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            91 => 
            array (
                'id' => 96,
                'cid' => 30,
                'name' => '德国爱他美（迪拜版） Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            92 => 
            array (
                'id' => 97,
                'cid' => 30,
                'name' => '雅士利 YASHiLY',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            93 => 
            array (
                'id' => 98,
                'cid' => 30,
                'name' => '澳佳宝 BLACKMORES',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            94 => 
            array (
                'id' => 99,
                'cid' => 30,
                'name' => '荷仕兰 Hosland',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            95 => 
            array (
                'id' => 100,
                'cid' => 30,
                'name' => '贝拉米 BELLAMY\'S',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            96 => 
            array (
                'id' => 101,
                'cid' => 32,
                'name' => '德国原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            97 => 
            array (
                'id' => 102,
                'cid' => 32,
                'name' => '荷兰原装 Nutrilon',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            98 => 
            array (
                'id' => 103,
                'cid' => 32,
                'name' => '英国原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            99 => 
            array (
                'id' => 104,
                'cid' => 32,
                'name' => '澳洲原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            100 => 
            array (
                'id' => 105,
                'cid' => 32,
                'name' => '德国原装 HiPP',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            101 => 
            array (
                'id' => 106,
                'cid' => 32,
                'name' => '德国原装 Topfer',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            102 => 
            array (
                'id' => 107,
                'cid' => 32,
                'name' => '新西兰原装 a2',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            103 => 
            array (
                'id' => 108,
                'cid' => 32,
                'name' => '英国原装 Cow&Gate',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            104 => 
            array (
                'id' => 109,
                'cid' => 32,
                'name' => '荷兰原装 Friso',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            105 => 
            array (
                'id' => 110,
                'cid' => 32,
                'name' => '荷兰原装 Hero Baby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            106 => 
            array (
                'id' => 111,
                'cid' => 32,
                'name' => '雅培 Abbott',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            107 => 
            array (
                'id' => 112,
                'cid' => 32,
                'name' => '德国原装 Holle',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            108 => 
            array (
                'id' => 113,
                'cid' => 32,
                'name' => '港版原装 美赞臣 MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            109 => 
            array (
                'id' => 114,
                'cid' => 32,
                'name' => '惠氏 Wyeth 港版启赋',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            110 => 
            array (
                'id' => 115,
                'cid' => 32,
                'name' => '美素佳儿 Friso',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            111 => 
            array (
                'id' => 116,
                'cid' => 32,
                'name' => '惠氏 Wyeth SMA 英国版',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            112 => 
            array (
                'id' => 117,
                'cid' => 32,
                'name' => '惠氏 Wyeth',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            113 => 
            array (
                'id' => 118,
                'cid' => 32,
                'name' => '惠氏 Wyeth 启赋',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            114 => 
            array (
                'id' => 119,
                'cid' => 32,
                'name' => '诺优能 Nutrilon',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            115 => 
            array (
                'id' => 120,
                'cid' => 32,
                'name' => '爱他美 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            116 => 
            array (
                'id' => 121,
                'cid' => 32,
                'name' => '澳洲原装 BELLAMY\'S',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            117 => 
            array (
                'id' => 122,
                'cid' => 32,
                'name' => '授权行货 喜宝',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            118 => 
            array (
                'id' => 123,
                'cid' => 32,
                'name' => '澳洲原装 惠氏S26 Wyeth',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            119 => 
            array (
                'id' => 124,
                'cid' => 32,
                'name' => '雀巢 Nestle',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            120 => 
            array (
                'id' => 125,
                'cid' => 32,
                'name' => '美赞臣 MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            121 => 
            array (
                'id' => 126,
                'cid' => 32,
                'name' => '澳洲原装 爱他美金装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            122 => 
            array (
                'id' => 127,
                'cid' => 32,
                'name' => '新西兰原装 Karicare',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            123 => 
            array (
                'id' => 128,
                'cid' => 32,
                'name' => '授权行货 特福芬 Topfer',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            124 => 
            array (
                'id' => 129,
                'cid' => 32,
                'name' => '澳洲爱他美Aptamil白金版 Aptamil Profutura',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            125 => 
            array (
                'id' => 130,
                'cid' => 32,
                'name' => 'Humana',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            126 => 
            array (
                'id' => 131,
                'cid' => 32,
                'name' => 'a2',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            127 => 
            array (
                'id' => 132,
                'cid' => 32,
                'name' => '多美滋 Dumex',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            128 => 
            array (
                'id' => 133,
                'cid' => 32,
                'name' => '雅士利 YASHiLY',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            129 => 
            array (
                'id' => 134,
                'cid' => 32,
                'name' => '澳洲原装博宝 bubs',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            130 => 
            array (
                'id' => 135,
                'cid' => 32,
                'name' => '合生元 BIOETIME',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            131 => 
            array (
                'id' => 136,
                'cid' => 32,
                'name' => '澳洲原装惠氏 S26系列 Wyeth S26',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            132 => 
            array (
                'id' => 137,
                'cid' => 32,
                'name' => '澳佳宝 BLACKMORES',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            133 => 
            array (
                'id' => 138,
                'cid' => 32,
                'name' => '咔哇熊 Cowala',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            134 => 
            array (
                'id' => 139,
                'cid' => 32,
                'name' => 'Arla',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            135 => 
            array (
                'id' => 140,
                'cid' => 32,
                'name' => '德国爱他美（迪拜版） Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            136 => 
            array (
                'id' => 141,
                'cid' => 32,
                'name' => 'EARTH\'S BESTl',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            137 => 
            array (
                'id' => 142,
                'cid' => 32,
                'name' => '荷仕兰 Hosland',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            138 => 
            array (
                'id' => 143,
                'cid' => 32,
                'name' => '贝拉米 BELLAMY\'S',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            139 => 
            array (
                'id' => 144,
                'cid' => 31,
                'name' => '德国原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            140 => 
            array (
                'id' => 145,
                'cid' => 31,
                'name' => '荷兰原装 Nutrilon',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            141 => 
            array (
                'id' => 146,
                'cid' => 31,
                'name' => '德国原装 HiPP',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            142 => 
            array (
                'id' => 147,
                'cid' => 31,
                'name' => '澳洲原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            143 => 
            array (
                'id' => 148,
                'cid' => 31,
                'name' => '英国原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            144 => 
            array (
                'id' => 149,
                'cid' => 31,
                'name' => '荷兰原装 Hero Baby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            145 => 
            array (
                'id' => 150,
                'cid' => 31,
                'name' => '美国原装 美赞臣 MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            146 => 
            array (
                'id' => 151,
                'cid' => 31,
                'name' => '德国原装 Holle',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            147 => 
            array (
                'id' => 152,
                'cid' => 31,
                'name' => '港版原装 美赞臣 MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            148 => 
            array (
                'id' => 153,
                'cid' => 31,
                'name' => '德国原装 Topfer',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            149 => 
            array (
                'id' => 154,
                'cid' => 31,
                'name' => '英国原装 Cow&Gate',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            150 => 
            array (
                'id' => 155,
                'cid' => 31,
                'name' => '新西兰原装 a2',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            151 => 
            array (
                'id' => 156,
                'cid' => 31,
                'name' => '惠氏 Wyeth 启赋',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            152 => 
            array (
                'id' => 157,
                'cid' => 31,
                'name' => '荷兰原装 Friso',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            153 => 
            array (
                'id' => 158,
                'cid' => 31,
                'name' => '诺优能 Nutrilon',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            154 => 
            array (
                'id' => 159,
                'cid' => 31,
                'name' => '惠氏 Wyeth 港版启赋',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            155 => 
            array (
                'id' => 160,
                'cid' => 31,
                'name' => '美素佳儿 Friso',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            156 => 
            array (
                'id' => 161,
                'cid' => 31,
                'name' => '雅培 Abbott',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            157 => 
            array (
                'id' => 162,
                'cid' => 31,
                'name' => '惠氏 Wyeth SMA 英国版',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            158 => 
            array (
                'id' => 163,
                'cid' => 31,
                'name' => '爱他美 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            159 => 
            array (
                'id' => 164,
                'cid' => 31,
                'name' => '惠氏 Wyeth',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            160 => 
            array (
                'id' => 165,
                'cid' => 31,
                'name' => '美赞臣 MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            161 => 
            array (
                'id' => 166,
                'cid' => 31,
                'name' => '澳洲原装 BELLAMY\'S',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            162 => 
            array (
                'id' => 167,
                'cid' => 31,
                'name' => '授权行货 喜宝',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            163 => 
            array (
                'id' => 168,
                'cid' => 31,
                'name' => '澳洲原装 爱他美金装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            164 => 
            array (
                'id' => 169,
                'cid' => 31,
                'name' => '授权行货 特福芬 Topfer',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            165 => 
            array (
                'id' => 170,
                'cid' => 31,
                'name' => '澳洲爱他美Aptamil白金版 Aptamil Profutura',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            166 => 
            array (
                'id' => 171,
                'cid' => 31,
                'name' => '澳洲原装 惠氏S26 Wyeth',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            167 => 
            array (
                'id' => 172,
                'cid' => 31,
                'name' => 'a2',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            168 => 
            array (
                'id' => 173,
                'cid' => 31,
                'name' => 'Humana',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            169 => 
            array (
                'id' => 174,
                'cid' => 31,
                'name' => '新西兰原装 Karicare',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            170 => 
            array (
                'id' => 175,
                'cid' => 31,
                'name' => '明治 meiji',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            171 => 
            array (
                'id' => 176,
                'cid' => 31,
                'name' => '日本原装 固力果 ICREO',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            172 => 
            array (
                'id' => 177,
                'cid' => 31,
                'name' => '雅士利 YASHiLY',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            173 => 
            array (
                'id' => 178,
                'cid' => 31,
                'name' => '雀巢 Nestle',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            174 => 
            array (
                'id' => 179,
                'cid' => 31,
                'name' => '合生元 BIOETIME',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            175 => 
            array (
                'id' => 180,
                'cid' => 31,
                'name' => '澳洲原装惠氏 S26系列 Wyeth S26',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            176 => 
            array (
                'id' => 181,
                'cid' => 31,
                'name' => '多美滋 Dumex',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            177 => 
            array (
                'id' => 182,
                'cid' => 31,
                'name' => 'Arla',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            178 => 
            array (
                'id' => 183,
                'cid' => 31,
                'name' => '澳洲原装博宝 bubs',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            179 => 
            array (
                'id' => 184,
                'cid' => 31,
                'name' => '森永 MORINAGA',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            180 => 
            array (
                'id' => 185,
                'cid' => 31,
                'name' => '咔哇熊 Cowala',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            181 => 
            array (
                'id' => 186,
                'cid' => 31,
                'name' => 'EARTH\'S BEST',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            182 => 
            array (
                'id' => 187,
                'cid' => 31,
                'name' => '澳佳宝 BLACKMORES',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            183 => 
            array (
                'id' => 188,
                'cid' => 31,
                'name' => '德国爱他美（迪拜版） Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            184 => 
            array (
                'id' => 189,
                'cid' => 31,
                'name' => '荷仕兰 Hosland',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            185 => 
            array (
                'id' => 190,
                'cid' => 31,
                'name' => '贝拉米 BELLAMY\'S',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            186 => 
            array (
                'id' => 191,
                'cid' => 33,
                'name' => '荷兰原装 Nutrilon',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            187 => 
            array (
                'id' => 192,
                'cid' => 33,
                'name' => '澳洲原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            188 => 
            array (
                'id' => 193,
                'cid' => 33,
                'name' => '英国原装 Cow&Gate',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            189 => 
            array (
                'id' => 194,
                'cid' => 33,
                'name' => '英国原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            190 => 
            array (
                'id' => 195,
                'cid' => 33,
                'name' => '荷兰原装 Hero Baby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            191 => 
            array (
                'id' => 196,
                'cid' => 33,
                'name' => '德国原装 Holle',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            192 => 
            array (
                'id' => 197,
                'cid' => 33,
                'name' => '港版原装 美赞臣 MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            193 => 
            array (
                'id' => 198,
                'cid' => 33,
                'name' => '惠氏 Wyeth 港版启赋',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            194 => 
            array (
                'id' => 199,
                'cid' => 33,
                'name' => '雅培 Abbott',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            195 => 
            array (
                'id' => 200,
                'cid' => 33,
                'name' => '惠氏 Wyeth 启赋',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            196 => 
            array (
                'id' => 201,
                'cid' => 33,
                'name' => '爱他美 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            197 => 
            array (
                'id' => 202,
                'cid' => 33,
                'name' => '美素佳儿 Friso',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            198 => 
            array (
                'id' => 203,
                'cid' => 33,
                'name' => '诺优能 Nutrilon',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            199 => 
            array (
                'id' => 204,
                'cid' => 33,
                'name' => '澳洲原装 惠氏S26 Wyeth',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            200 => 
            array (
                'id' => 205,
                'cid' => 33,
                'name' => '澳洲原装 惠氏S26 Wyeth',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            201 => 
            array (
                'id' => 206,
                'cid' => 33,
                'name' => '惠氏 Wyeth',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            202 => 
            array (
                'id' => 207,
                'cid' => 33,
                'name' => '澳洲爱他美Aptamil白金版 Aptamil Profutura',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            203 => 
            array (
                'id' => 208,
                'cid' => 33,
                'name' => '澳洲原装 爱他美金装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            204 => 
            array (
                'id' => 209,
                'cid' => 33,
                'name' => '美赞臣 MeadJohnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            205 => 
            array (
                'id' => 210,
                'cid' => 33,
                'name' => '多美滋 Dumex',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            206 => 
            array (
                'id' => 211,
                'cid' => 33,
                'name' => '澳洲原装惠氏 S26系列 Wyeth S26',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            207 => 
            array (
                'id' => 212,
                'cid' => 33,
                'name' => '德国爱他美（迪拜版） Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            208 => 
            array (
                'id' => 213,
                'cid' => 33,
                'name' => '合生元 BIOETIME',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            209 => 
            array (
                'id' => 214,
                'cid' => 34,
                'name' => '荷兰原装 Nutrilon',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            210 => 
            array (
                'id' => 215,
                'cid' => 34,
                'name' => '荷兰原装 Hero Baby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            211 => 
            array (
                'id' => 216,
                'cid' => 34,
                'name' => '港版原装 美赞臣 MeadJ',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            212 => 
            array (
                'id' => 217,
                'cid' => 36,
                'name' => '德国原装 Aptamil',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            213 => 
            array (
                'id' => 218,
                'cid' => 36,
                'name' => '德国原装 HiPP',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            214 => 
            array (
                'id' => 219,
                'cid' => 36,
                'name' => '德国原装 Topfer',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            215 => 
            array (
                'id' => 220,
                'cid' => 36,
                'name' => '澳洲原装雅培小安素 Pedi',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            216 => 
            array (
                'id' => 221,
                'cid' => 37,
                'name' => '澳洲原装雅培小安素 Pedi',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            217 => 
            array (
                'id' => 222,
                'cid' => 37,
                'name' => '德国原装 HiPP',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            218 => 
            array (
                'id' => 223,
                'cid' => 38,
                'name' => '花王 Merries',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            219 => 
            array (
                'id' => 224,
                'cid' => 38,
                'name' => '尤妮佳 moony',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            220 => 
            array (
                'id' => 225,
                'cid' => 38,
                'name' => '大王 GOO.N',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            221 => 
            array (
                'id' => 226,
                'cid' => 38,
                'name' => '好奇 HUGGIES 金装',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            222 => 
            array (
                'id' => 227,
                'cid' => 38,
                'name' => '帮宝适 Pampers',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            223 => 
            array (
                'id' => 228,
                'cid' => 38,
                'name' => '妈咪宝贝 MamyPoko',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            224 => 
            array (
                'id' => 229,
                'cid' => 38,
                'name' => '好奇 HUGGIES 银装',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            225 => 
            array (
                'id' => 230,
                'cid' => 38,
                'name' => '丽贝乐 Libero',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            226 => 
            array (
                'id' => 231,
                'cid' => 38,
                'name' => '爱婴舒坦 BioFities',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            227 => 
            array (
                'id' => 232,
                'cid' => 38,
                'name' => '班博 BAMBO',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            228 => 
            array (
                'id' => 233,
                'cid' => 38,
                'name' => '雀氏 Chiaus',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            229 => 
            array (
                'id' => 234,
                'cid' => 38,
                'name' => '威尔贝鲁 wellber',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            230 => 
            array (
                'id' => 235,
                'cid' => 39,
                'name' => '维达 Vinda',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            231 => 
            array (
                'id' => 236,
                'cid' => 39,
                'name' => '和光堂 wakodo',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            232 => 
            array (
                'id' => 237,
                'cid' => 39,
                'name' => '慕逸适 moist',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            233 => 
            array (
                'id' => 238,
                'cid' => 39,
                'name' => '花王 Merries',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            234 => 
            array (
                'id' => 239,
                'cid' => 39,
                'name' => '得宝 Tempo',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            235 => 
            array (
                'id' => 240,
                'cid' => 39,
                'name' => '小林制药 KOBAYASHI',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            236 => 
            array (
                'id' => 241,
                'cid' => 39,
                'name' => '妮飘 nepia',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            237 => 
            array (
                'id' => 242,
                'cid' => 39,
                'name' => '甘尼克 babyganics',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            238 => 
            array (
                'id' => 243,
                'cid' => 39,
                'name' => '心相印',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            239 => 
            array (
                'id' => 244,
                'cid' => 39,
                'name' => '康乃馨 Carnation',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            240 => 
            array (
                'id' => 245,
                'cid' => 39,
                'name' => '全棉时代 PurCotton',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            241 => 
            array (
                'id' => 246,
                'cid' => 39,
                'name' => '倍伊乐 Panlex',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            242 => 
            array (
                'id' => 247,
                'cid' => 39,
                'name' => '塔卡塔图 TAKATATU',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            243 => 
            array (
                'id' => 248,
                'cid' => 39,
                'name' => '澳斯贝贝 AUSTTBABY',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            244 => 
            array (
                'id' => 249,
                'cid' => 39,
                'name' => '清风',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            245 => 
            array (
                'id' => 250,
                'cid' => 39,
                'name' => '泉林本色',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            246 => 
            array (
                'id' => 251,
                'cid' => 39,
                'name' => '侨丰',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            247 => 
            array (
                'id' => 252,
                'cid' => 39,
                'name' => '佳韵宝 Joyourbaby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            248 => 
            array (
                'id' => 253,
                'cid' => 39,
                'name' => '瑞诺瓦之爱 Renova',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            249 => 
            array (
                'id' => 254,
                'cid' => 39,
                'name' => '乐孕',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            250 => 
            array (
                'id' => 255,
                'cid' => 39,
                'name' => 'Ubela',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            251 => 
            array (
                'id' => 256,
                'cid' => 39,
                'name' => '威奇 UYEKI',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            252 => 
            array (
                'id' => 257,
                'cid' => 39,
                'name' => '棒棒猪',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            253 => 
            array (
                'id' => 258,
                'cid' => 39,
                'name' => '欧淘 otao',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            254 => 
            array (
                'id' => 259,
                'cid' => 39,
                'name' => '五羊 FIVERAMS',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            255 => 
            array (
                'id' => 260,
                'cid' => 39,
                'name' => '十月结晶',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            256 => 
            array (
                'id' => 261,
                'cid' => 39,
                'name' => '怡恩贝 ein.b',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            257 => 
            array (
                'id' => 262,
                'cid' => 40,
                'name' => '花王 Merries',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            258 => 
            array (
                'id' => 263,
                'cid' => 40,
                'name' => '花王 Merries',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            259 => 
            array (
                'id' => 264,
                'cid' => 40,
                'name' => '大王 GOO.N',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            260 => 
            array (
                'id' => 265,
                'cid' => 40,
                'name' => '班博 BAMBO',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            261 => 
            array (
                'id' => 266,
                'cid' => 40,
                'name' => '帮宝适 Pampers',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            262 => 
            array (
                'id' => 267,
                'cid' => 40,
                'name' => '好奇 HUGGIES 铂金装',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            263 => 
            array (
                'id' => 268,
                'cid' => 40,
                'name' => '好奇 HUGGIES 金装',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            264 => 
            array (
                'id' => 269,
                'cid' => 40,
                'name' => '帮宝适 Pampers 日本紫帮',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            265 => 
            array (
                'id' => 270,
                'cid' => 40,
                'name' => '好奇 HUGGIES 银装',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            266 => 
            array (
                'id' => 271,
                'cid' => 40,
                'name' => '妈咪宝贝 MamyPoko',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            267 => 
            array (
                'id' => 272,
                'cid' => 40,
                'name' => '丽贝乐 Libero',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            268 => 
            array (
                'id' => 273,
                'cid' => 40,
                'name' => '爱婴舒坦 BioFities',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            269 => 
            array (
                'id' => 274,
                'cid' => 40,
                'name' => '全棉时代 PurCotton',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            270 => 
            array (
                'id' => 275,
                'cid' => 40,
                'name' => '雀氏 Chiaus',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            271 => 
            array (
                'id' => 276,
                'cid' => 40,
                'name' => '妈恩蓓 momandbab',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            272 => 
            array (
                'id' => 277,
                'cid' => 40,
                'name' => '好奇 HUGGIES',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            273 => 
            array (
                'id' => 278,
                'cid' => 41,
                'name' => '尤妮佳 moony',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            274 => 
            array (
                'id' => 279,
                'cid' => 41,
                'name' => '大王 GOO.N',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            275 => 
            array (
                'id' => 280,
                'cid' => 41,
                'name' => '大王 GOO.N',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            276 => 
            array (
                'id' => 281,
                'cid' => 41,
                'name' => 'BROWN',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            277 => 
            array (
                'id' => 282,
                'cid' => 41,
                'name' => 'NUK',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            278 => 
            array (
                'id' => 283,
                'cid' => 41,
                'name' => '花王 Merries',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            279 => 
            array (
                'id' => 284,
                'cid' => 41,
                'name' => '啾啾 CHUCHU',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            280 => 
            array (
                'id' => 285,
                'cid' => 41,
                'name' => '贝亲 Pigeon',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            281 => 
            array (
                'id' => 286,
                'cid' => 41,
                'name' => '顺顺儿',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            282 => 
            array (
                'id' => 287,
                'cid' => 41,
                'name' => '飞利浦 新安怡 AVENT',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            283 => 
            array (
                'id' => 288,
                'cid' => 41,
                'name' => '宝贝可爱 nac nac',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            284 => 
            array (
                'id' => 289,
                'cid' => 41,
                'name' => '宝贝可爱 nac nac',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            285 => 
            array (
                'id' => 290,
                'cid' => 41,
                'name' => '乐儿宝 bobo',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            286 => 
            array (
                'id' => 291,
                'cid' => 41,
                'name' => '康贝 Combi',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            287 => 
            array (
                'id' => 292,
                'cid' => 41,
                'name' => '妙思乐 mustela',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            288 => 
            array (
                'id' => 293,
                'cid' => 41,
                'name' => 'Cocokids',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            289 => 
            array (
                'id' => 294,
                'cid' => 41,
                'name' => '润本',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            290 => 
            array (
                'id' => 295,
                'cid' => 41,
                'name' => '红色小象',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            291 => 
            array (
                'id' => 296,
                'cid' => 41,
                'name' => '阿卡佳 AKACHAN',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            292 => 
            array (
                'id' => 297,
                'cid' => 41,
                'name' => '五个小卡车 Five Trucks',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            293 => 
            array (
                'id' => 298,
                'cid' => 41,
                'name' => '努比 Nuby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            294 => 
            array (
                'id' => 299,
                'cid' => 41,
                'name' => '漂儿适',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            295 => 
            array (
                'id' => 300,
                'cid' => 41,
                'name' => '甘尼克 babyganics',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            296 => 
            array (
                'id' => 301,
                'cid' => 41,
                'name' => '保宁 B&B',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            297 => 
            array (
                'id' => 302,
                'cid' => 41,
                'name' => '小树苗 little tree',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            298 => 
            array (
                'id' => 303,
                'cid' => 41,
                'name' => 'U-ZA',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            299 => 
            array (
                'id' => 304,
                'cid' => 41,
                'name' => '倍伊乐 Panlex',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            300 => 
            array (
                'id' => 305,
                'cid' => 41,
                'name' => '希杰狮王 CJ LION',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            301 => 
            array (
                'id' => 306,
                'cid' => 41,
                'name' => '鼻涕虫 Boogie Wipes',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            302 => 
            array (
                'id' => 307,
                'cid' => 41,
                'name' => '五羊 FIVERAMS',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            303 => 
            array (
                'id' => 308,
                'cid' => 41,
                'name' => '强生 Johnson',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            304 => 
            array (
                'id' => 309,
                'cid' => 41,
                'name' => '子初 Springbuds',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            305 => 
            array (
                'id' => 310,
                'cid' => 41,
                'name' => '班博 BAMBO',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            306 => 
            array (
                'id' => 311,
                'cid' => 41,
                'name' => '布朗博士 Dr Brown\'s',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            307 => 
            array (
                'id' => 312,
                'cid' => 41,
                'name' => '智高 chicco',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            308 => 
            array (
                'id' => 313,
                'cid' => 41,
                'name' => '好奇 HUGGIES 铂金装',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            309 => 
            array (
                'id' => 314,
                'cid' => 41,
                'name' => '全棉时代 PurCotton',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            310 => 
            array (
                'id' => 315,
                'cid' => 41,
                'name' => 'jackson reece',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            311 => 
            array (
                'id' => 316,
                'cid' => 41,
                'name' => '塔卡塔图 TAKATATU',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            312 => 
            array (
                'id' => 317,
                'cid' => 41,
                'name' => '贝贝怡 bornbay',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            313 => 
            array (
                'id' => 318,
                'cid' => 41,
                'name' => '威尔贝鲁 wellber',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            314 => 
            array (
                'id' => 319,
                'cid' => 41,
                'name' => 'K-MOM',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            315 => 
            array (
                'id' => 320,
                'cid' => 41,
                'name' => '好奇 HUGGIES 金装',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            316 => 
            array (
                'id' => 321,
                'cid' => 41,
                'name' => '意婴堡',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            317 => 
            array (
                'id' => 322,
                'cid' => 41,
                'name' => '惠氏',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            318 => 
            array (
                'id' => 323,
                'cid' => 41,
                'name' => '格朗 GL',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            319 => 
            array (
                'id' => 324,
                'cid' => 41,
                'name' => '好孩子 GOODBABY',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            320 => 
            array (
                'id' => 325,
                'cid' => 41,
                'name' => '丽贝乐 Libero',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            321 => 
            array (
                'id' => 326,
                'cid' => 41,
                'name' => '亲亲我 KIDSME',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            322 => 
            array (
                'id' => 327,
                'cid' => 41,
                'name' => '棒棒猪',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            323 => 
            array (
                'id' => 328,
                'cid' => 41,
                'name' => '澳斯贝贝 AUSTTBABY',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            324 => 
            array (
                'id' => 329,
                'cid' => 41,
                'name' => '宝宝金水',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            325 => 
            array (
                'id' => 330,
                'cid' => 41,
                'name' => '怡恩贝 ein.b',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            326 => 
            array (
                'id' => 331,
                'cid' => 41,
                'name' => '贝悦 Beinjoy',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            327 => 
            array (
                'id' => 332,
                'cid' => 41,
                'name' => '帮宝适 Pampers',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            328 => 
            array (
                'id' => 333,
                'cid' => 41,
                'name' => '优简 BestJane',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            329 => 
            array (
                'id' => 334,
                'cid' => 41,
                'name' => '新贝 NCVI',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            330 => 
            array (
                'id' => 335,
                'cid' => 41,
                'name' => '母爱 muai',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            331 => 
            array (
                'id' => 336,
                'cid' => 41,
                'name' => 'V&E',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            332 => 
            array (
                'id' => 337,
                'cid' => 41,
                'name' => '青蛙王子 FrogPrince',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            333 => 
            array (
                'id' => 338,
                'cid' => 41,
                'name' => '艾娜骑士 Aina Kids',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            334 => 
            array (
                'id' => 339,
                'cid' => 41,
                'name' => '心相印',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            335 => 
            array (
                'id' => 340,
                'cid' => 41,
                'name' => '雀氏 Chiaus',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            336 => 
            array (
                'id' => 341,
                'cid' => 41,
                'name' => '露安适 Lelch',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            337 => 
            array (
                'id' => 342,
                'cid' => 41,
                'name' => '良良',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            338 => 
            array (
                'id' => 343,
                'cid' => 41,
                'name' => '蒂乐 dile',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            339 => 
            array (
                'id' => 344,
                'cid' => 41,
                'name' => '自然之爱 NATURE LOVE MER',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            340 => 
            array (
                'id' => 345,
                'cid' => 41,
                'name' => '游心 ASOKO',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            341 => 
            array (
                'id' => 346,
                'cid' => 41,
                'name' => '安儿欣 babiSafe',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            342 => 
            array (
                'id' => 347,
                'cid' => 41,
                'name' => 'Angell',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            343 => 
            array (
                'id' => 348,
                'cid' => 41,
                'name' => '妈咪宝贝 MamyPoko',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            344 => 
            array (
                'id' => 349,
                'cid' => 41,
                'name' => '爱得利',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            345 => 
            array (
                'id' => 350,
                'cid' => 41,
                'name' => '全因爱 lovology',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            346 => 
            array (
                'id' => 351,
                'cid' => 41,
                'name' => '海绵宝宝 SPONGEBOB SQUAREPANTS',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            347 => 
            array (
                'id' => 352,
                'cid' => 41,
                'name' => '彼特的奶蜂 Peter\'s Bees',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            348 => 
            array (
                'id' => 353,
                'cid' => 41,
                'name' => '十月妈咪 octmami',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            349 => 
            array (
                'id' => 354,
                'cid' => 41,
                'name' => '米卡乐智',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            350 => 
            array (
                'id' => 355,
                'cid' => 41,
                'name' => '棉店 COTTONSHOP',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            351 => 
            array (
                'id' => 356,
                'cid' => 41,
                'name' => '乐婴泉 UAA',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            352 => 
            array (
                'id' => 357,
                'cid' => 41,
                'name' => '多顺',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            353 => 
            array (
                'id' => 358,
                'cid' => 41,
                'name' => '清风',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            354 => 
            array (
                'id' => 359,
                'cid' => 41,
                'name' => '全能妈妈 super mama',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            355 => 
            array (
                'id' => 360,
                'cid' => 41,
                'name' => 'eotton',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            356 => 
            array (
                'id' => 361,
                'cid' => 41,
                'name' => '瑞莎 Zwitsal',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            357 => 
            array (
                'id' => 362,
                'cid' => 41,
                'name' => '大卫 amethyst',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            358 => 
            array (
                'id' => 363,
                'cid' => 41,
                'name' => '欧淘 otao',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            359 => 
            array (
                'id' => 364,
                'cid' => 41,
                'name' => '贝立安 Brillante',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            360 => 
            array (
                'id' => 365,
                'cid' => 41,
                'name' => '宝宝贝贝 BeBe PoPo',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            361 => 
            array (
                'id' => 366,
                'cid' => 41,
                'name' => '柚子宝宝 MELON BABY',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            362 => 
            array (
                'id' => 367,
                'cid' => 41,
                'name' => '瑞士宝琪 b&h',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            363 => 
            array (
                'id' => 368,
                'cid' => 41,
                'name' => '琳达妈咪',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            364 => 
            array (
                'id' => 369,
                'cid' => 41,
                'name' => '壳壳嘟噜噜 COKO DORORO',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            365 => 
            array (
                'id' => 370,
                'cid' => 41,
                'name' => '爱丽思 IRIS',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            366 => 
            array (
                'id' => 371,
                'cid' => 41,
                'name' => '贝比乐乐',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            367 => 
            array (
                'id' => 372,
                'cid' => 41,
                'name' => '奶拉贝儿 mirabelle',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            368 => 
            array (
                'id' => 373,
                'cid' => 41,
                'name' => '十月天使',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            369 => 
            array (
                'id' => 374,
                'cid' => 41,
                'name' => '恩姆花园',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            370 => 
            array (
                'id' => 375,
                'cid' => 41,
                'name' => '艾贝琪 ABQ',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            371 => 
            array (
                'id' => 376,
                'cid' => 41,
                'name' => '肌肤乐 Gifrer',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            372 => 
            array (
                'id' => 377,
                'cid' => 41,
                'name' => '葆婴 babycare',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            373 => 
            array (
                'id' => 378,
                'cid' => 42,
                'name' => 'SHILOH',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            374 => 
            array (
                'id' => 379,
                'cid' => 42,
                'name' => '贝贝怡 bornbay',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            375 => 
            array (
                'id' => 380,
                'cid' => 42,
                'name' => '优简 BestJane',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            376 => 
            array (
                'id' => 381,
                'cid' => 42,
                'name' => '澳斯贝贝 AUSTTBABY',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            377 => 
            array (
                'id' => 382,
                'cid' => 42,
                'name' => '迪士尼 Disney',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            378 => 
            array (
                'id' => 383,
                'cid' => 42,
                'name' => 'Zoli',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            379 => 
            array (
                'id' => 384,
                'cid' => 42,
                'name' => '米卡乐智',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            380 => 
            array (
                'id' => 385,
                'cid' => 42,
                'name' => '子初 Springbuds',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            381 => 
            array (
                'id' => 386,
                'cid' => 42,
                'name' => '安茵儿 Aninkids',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            382 => 
            array (
                'id' => 387,
                'cid' => 42,
                'name' => '塔卡塔图 TAKATATU',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            383 => 
            array (
                'id' => 388,
                'cid' => 42,
                'name' => '佳韵宝 Joyourbaby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            384 => 
            array (
                'id' => 389,
                'cid' => 42,
                'name' => '婧麒 JOYNCLEON',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            385 => 
            array (
                'id' => 390,
                'cid' => 42,
                'name' => '威尔贝鲁 wellber',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            386 => 
            array (
                'id' => 391,
                'cid' => 42,
                'name' => '棉花堂 Cotton Town',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            387 => 
            array (
                'id' => 392,
                'cid' => 42,
                'name' => '沐乐维',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            388 => 
            array (
                'id' => 393,
                'cid' => 42,
                'name' => '贝儿乐',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            389 => 
            array (
                'id' => 394,
                'cid' => 42,
                'name' => '爱蓓优 LOVE BB&',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            390 => 
            array (
                'id' => 395,
                'cid' => 42,
                'name' => '巧尼熊',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            391 => 
            array (
                'id' => 396,
                'cid' => 42,
                'name' => '海绵泡泡 himipopo',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            392 => 
            array (
                'id' => 397,
                'cid' => 42,
                'name' => '费雪 Fisher Price',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            393 => 
            array (
                'id' => 398,
                'cid' => 42,
                'name' => '妈咪呢喃 MUMNENA',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            394 => 
            array (
                'id' => 399,
                'cid' => 42,
                'name' => '乐桃和家 TAOlifestyle',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            395 => 
            array (
                'id' => 400,
                'cid' => 42,
                'name' => 'Angell',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            396 => 
            array (
                'id' => 401,
                'cid' => 42,
                'name' => '麦拉贝拉 MOLO BALO',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            397 => 
            array (
                'id' => 402,
                'cid' => 42,
                'name' => 'GroVia',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            398 => 
            array (
                'id' => 403,
                'cid' => 42,
                'name' => '十月妈咪 octmami',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            399 => 
            array (
                'id' => 404,
                'cid' => 42,
                'name' => '全棉时代 PurCotton',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            400 => 
            array (
                'id' => 405,
                'cid' => 42,
                'name' => '新贝 NCVI',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            401 => 
            array (
                'id' => 406,
                'cid' => 42,
                'name' => '笨笨熊',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            402 => 
            array (
                'id' => 407,
                'cid' => 42,
                'name' => '米乐鱼',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            403 => 
            array (
                'id' => 408,
                'cid' => 42,
                'name' => '宝然 Baoran',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            404 => 
            array (
                'id' => 409,
                'cid' => 42,
                'name' => '大朴 DAPU',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            405 => 
            array (
                'id' => 410,
                'cid' => 42,
                'name' => '阿卡手工',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            406 => 
            array (
                'id' => 411,
                'cid' => 42,
                'name' => '3KOALAS',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            407 => 
            array (
                'id' => 412,
                'cid' => 42,
                'name' => '博睿恩 pureborn',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            408 => 
            array (
                'id' => 413,
                'cid' => 42,
                'name' => '美好宝贝 BestBaby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            409 => 
            array (
                'id' => 414,
                'cid' => 42,
                'name' => '欧淘 otao',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            410 => 
            array (
                'id' => 415,
                'cid' => 42,
                'name' => '艾娜骑士 Aina Kids',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            411 => 
            array (
                'id' => 416,
                'cid' => 42,
                'name' => '娃娃舒',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            412 => 
            array (
                'id' => 417,
                'cid' => 42,
                'name' => '柏逦莎',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            413 => 
            array (
                'id' => 418,
                'cid' => 42,
                'name' => 'dapubaby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            414 => 
            array (
                'id' => 419,
                'cid' => 42,
                'name' => '贝吻 BBKISS',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            415 => 
            array (
                'id' => 420,
                'cid' => 42,
                'name' => '戴维贝拉 dave&bella',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            416 => 
            array (
                'id' => 421,
                'cid' => 42,
                'name' => '恩施贝比 Enshibaby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            417 => 
            array (
                'id' => 422,
                'cid' => 42,
                'name' => '十月结晶',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            418 => 
            array (
                'id' => 423,
                'cid' => 42,
                'name' => '棉店 COTTONSHOP',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            419 => 
            array (
                'id' => 424,
                'cid' => 42,
                'name' => '圣宝度伦 senbodulun',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            420 => 
            array (
                'id' => 425,
                'cid' => 42,
                'name' => '圣宝度伦 senbodulun',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            421 => 
            array (
                'id' => 426,
                'cid' => 42,
                'name' => '舒乐宝贝 Snoozebaby',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            422 => 
            array (
                'id' => 427,
                'cid' => 42,
                'name' => '好孩子 GOODBABY',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            423 => 
            array (
                'id' => 428,
                'cid' => 42,
                'name' => '博菩点点 Bopudiandian',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            424 => 
            array (
                'id' => 429,
                'cid' => 42,
                'name' => 'i-angel',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            425 => 
            array (
                'id' => 430,
                'cid' => 42,
                'name' => '南极人',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            426 => 
            array (
                'id' => 431,
                'cid' => 42,
                'name' => '小米米 minimoto',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            427 => 
            array (
                'id' => 432,
                'cid' => 42,
                'name' => '多米贝贝',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            428 => 
            array (
                'id' => 433,
                'cid' => 42,
                'name' => '意婴堡',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            429 => 
            array (
                'id' => 434,
                'cid' => 42,
                'name' => '谷斐尔 GOPHER',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            430 => 
            array (
                'id' => 435,
                'cid' => 42,
                'name' => '爱可婴',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            431 => 
            array (
                'id' => 436,
                'cid' => 42,
                'name' => '丽贝乐 Libero',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            432 => 
            array (
                'id' => 437,
                'cid' => 42,
                'name' => '乐儿宝 bobo',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
            433 => 
            array (
                'id' => 438,
                'cid' => 42,
                'name' => '哼哼兔&呵呵兔 HHTu',
                'desc' => '&lt;p&gt;暂无&lt;br/&gt;&lt;/p&gt;',
                'img' => 'default.jpg',
                'status' => 1,
            ),
        ));
        
        
    }
}
